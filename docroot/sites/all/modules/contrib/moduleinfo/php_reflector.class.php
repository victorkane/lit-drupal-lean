<?php

/**
 * @file
 * Class for parsing PHP files without including them.
 */

class PhpReflectorException extends Exception {}

/**
 * Parses sourcecode, provided as string, for function signatures and
 * PhpDoc comments for further use.
 *
 * This file is part of the moduleinfo module made by the author.
 *
 * @author Ronald Locke
 * @version 0.1
 */
class PhpReflector {
  protected $content;
  protected $tokens;
  protected $classes;
  protected $result;
  protected $variables;

  /**
   * Initialize a few attributes.
   *
   * @param string $content
   *   Content of a file
   */
  public function __construct($content) {
    $this->content = $content;
    $this->tokens  = array();
    $this->classes = array();
    $this->result = array();
  }

  /**
   * Parses the sourcestring for PHP symbols.
   *
   * @throws PhpReflectorException
   */
  public function parse() {
    $this->tokens = $tokens = token_get_all($this->content);

    // Removing all T_WHITESPACE
    $this->removeWhitespace();
    $this->removeClasses();

    $this->parseDefinedFunctions();
    $this->parseUsedVariables();
    $this->parseCalledFunctions();
  }

  /**
   * Returns the result Arrays.
   */
  public function getResult() {
    return $this->result;
  }

  /**
   * Will extract a function from the tokens array.
   *
   * @param int $j
   *   Position in the token array
   */
  protected function extractDefinedFunction($j) {
    $def = (object) array(
      'name' => '',
      'signature' => '',
      'doc' => '',
      'doc_short' => '',
      'line_number' => '',
    );

    $token = $this->tokens[$j];
    $def->line_number = $token[2];

    // Going up the array for a PhpDoc comment.
    for ($i = $j; $i > 0; $i--) {
      $token = $this->tokens[$i];
      if (is_string($token) && in_array($token, array('}'))) {
        break;
      }
      if (is_array($token)) {
        if (in_array($token['name'], array('T_OPEN_TAG', 'T_COMMENT'))) {
          break;
        }

        if ($token['name'] == 'T_DOC_COMMENT') {
          $def->doc = $token[1];
          $def->doc_short = $this->extractDocShort($def->doc);
          break;
        }
      }
    }

    // Going down the array for the signature.
    $function_name = NULL;
    $bracket_stack = array();
    $mode = NULL;
    $signature_elements = array();
    for ($i = $j; $i < count($this->tokens); $i++) {
      $token = $this->tokens[$i];

      if (is_array($token)) {
        $signature_elements[] = $token[1];
        if (in_array($token['name'], array('T_FUNCTION'))) {
          array_pop($signature_elements);
        }
      }
      else {
        $signature_elements[] = $token;
        if (in_array($token, array('=', ','))) {
          $signature_elements[] = ' ';
        }
      }

      if (is_array($token) && $token['name'] == 'T_STRING' && is_null($function_name)) {
        $function_name = $token[1];
        $def->line_number = $token[2];
      }
      if (is_string($token) && $token == '(') {
        $mode = 'signature';
        $bracket_stack[] = ')';
      }
      if (is_string($token) && $token == ')' && $mode == 'signature') {
        array_pop($bracket_stack);
        if (!count($bracket_stack)) {
          break;
        }
      }
    }

    $def->name = $function_name;

    // Having a nice arguments list.
    $signature = str_replace('=', ' =', implode('', $signature_elements));
    $signature = preg_replace('/([^(&])(\$|&)/ui', '\\1 \\2', $signature);

    $def->signature = $signature;

    $this->result['defined functions'][] = $def;
  }
  /**
   * Will extract a function from the tokens array.
   *
   * @param int $j
   *   Position in the token array
   */
  protected function extractUsedVariables($j) {
    $def = (object) array(
      'name' => '',
      'line_number' => '',
    );

    $token = $this->tokens[$j];
    $name = $token[1];

    if (isset($this->variables[$name])) {
      return;
    }

    $def->line_number = $token[2];
    $def->name = $name;

    $this->variables[$name] = TRUE;

    $this->result['used variables'][] = $def;
  }

  /**
   * Will extract a function call from the tokens array.
   *
   * @param int $j
   *   Position in the token array
   */
  protected function extractCalledFunction($j) {
    $def = (object) array(
      'name' => '',
      'signature' => '',
      'line_number' => '',
    );

    $token = $this->tokens[$j];
    $def->name = $token[1];
    $def->line_number = $token[2];

    // Going up the array for a PhpDoc comment.
    if (!isset($this->tokens[$j - 1])) {
      return;
    }

    $token_before = $this->tokens[$j - 1];
    if (is_array($token_before)) {
      if (in_array($token_before['name'], array('T_FUNCTION'))) {
        return;
      }
    }

    // The next Token after a T_STRING should be a open bracket.
    if (!isset($this->tokens[$j + 1])) {
      return;
    }

    $token_after = $this->tokens[$j + 1];
    if (!is_string($token_after)) {
      return;
    }
    if ($token_after != '(') {
      return;
    }

    $bracket_stack = array();
    $mode = NULL;
    $signature_elements = array();
    for ($i = $j + 1; $i < count($this->tokens); $i++) {
      $token = $this->tokens[$i];

      if (is_array($token)) {
        $signature_elements[] = $token[1];
      }
      else {
        $signature_elements[] = $token;
        if (in_array($token, array('=', ','))) {
          $signature_elements[] = ' ';
        }
      }

      if (is_string($token) && $token == '(') {
        $mode = 'signature';
        $bracket_stack[] = ')';
      }
      if (is_string($token) && $token == ')' && $mode == 'signature') {
        array_pop($bracket_stack);
        if (!count($bracket_stack)) {
          break;
        }
      }
    }

    // Having a nice arguments list.
    $signature = str_replace('=', ' =', implode('', $signature_elements));
    $signature = preg_replace('/([^(&])(\$|&)/ui', '\\1 \\2', $signature);

    $def->signature = $def->name . $signature;

    $this->result['called functions'][] = $def;
  }

  /**
   * Extracts the first important sentence of a DocComment.
   *
   * @param string $phpdoc
   *   The whole DocComment.
   *
   * @return string
   *   The Short comment
   */
  protected function extractDocShort($phpdoc) {
    $tmp = str_replace(array('/*', '*/', '*'), ' ', $phpdoc);
    $tmp = explode("\n", $tmp);
    $tmp = array_map('trim', $tmp);

    $mode = NULL;
    foreach ($tmp as $i => $row) {
      if ($row != '') {
        $mode = TRUE;
        continue;
      }

      if ($mode && empty($row)) {
        $desc = array_slice($tmp, 0, $i);
        $desc = array_filter($desc);
        $short_desc = implode(' ', $desc);
        return $short_desc;
      }
    }

    return 'Unknown';
  }

  /**
   * Removing T_WHITESPACE to have a smaller array to parse.
   */
  protected function removeWhitespace() {
    foreach ($this->tokens as $i => $token) {
      if (!is_array($token)) {
        continue;
      }
      $token_name = token_name($token[0]);
      if ($token_name == 'T_WHITESPACE') {
        unset($this->tokens[$i]);
        continue;
      }
      $this->tokens[$i]['name'] = $token_name;
    }
    $this->tokens = array_merge($this->tokens, array());
  }

  /**
   * Removing Classes and Interfaces, because this will make
   * everything harder.
   */
  protected function removeClasses() {
    foreach ($this->tokens as $i => $token) {
      if (!is_array($token)) {
        continue;
      }
      $token_name = token_name($token[0]);
      if ($token_name == 'T_CLASS') {
        unset($this->tokens[$i]);
      }
      $this->tokens[$i]['name'] = $token_name;
    }
  }

  /**
   * Parsing for defined functions, for further analysing.
   */
  protected function parseUsedVariables() {
    foreach ($this->tokens as $i => $token) {
      if (is_array($token)) {
        if ($token['name'] == 'T_VARIABLE') {
          $this->extractUsedVariables($i);
        }
      }
    }
  }

  /**
   * Parsing for defined functions, for further analysing.
   */
  protected function parseDefinedFunctions() {
    foreach ($this->tokens as $i => $token) {
      if (is_array($token)) {
        if ($token['name'] == 'T_FUNCTION') {
          $this->extractDefinedFunction($i);
        }
      }
    }
  }

  /**
   * Parsing for called functions, for further analysing.
   */
  protected function parseCalledFunctions() {
    foreach ($this->tokens as $i => $token) {
      if (is_array($token)) {
        if ($token['name'] == 'T_STRING') {
          $this->extractCalledFunction($i);
        }
      }
    }
  }
}
