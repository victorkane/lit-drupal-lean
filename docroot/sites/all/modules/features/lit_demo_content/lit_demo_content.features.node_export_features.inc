<?php
/**
 * @file
 * lit_demo_content.features.node_export_features.inc
 */

/**
 * Implements hook_node_export_features_default().
 */
function lit_demo_content_node_export_features_default() {
  $node_export = array(
  'code_string' => 'array(
  (object) array(
      \'vid\' => \'3\',
      \'uid\' => \'2\',
      \'title\' => \' Submission: Sonnet II by bard 201312251752\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'1902eb8b-fbf6-4e33-8476-7e2ead06b372\',
      \'nid\' => \'2\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1387993938\',
      \'changed\' => \'1387993938\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'23f49787-d141-4f47-9976-38c25b26a222\',
      \'revision_timestamp\' => \'1387993938\',
      \'revision_uid\' => \'2\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "When forty winters shall beseige thy brow,\\r\\nAnd dig deep trenches in thy beauty\'s field,\\r\\nThy youth\'s proud livery, so gazed on now,\\r\\nWill be a tatter\'d weed, of small worth held:\\r\\nThen being ask\'d where all thy beauty lies,\\r\\nWhere all the treasure of thy lusty days,\\r\\nTo say, within thine own deep-sunken eyes,\\r\\nWere an all-eating shame and thriftless praise.\\r\\nHow much more praise deserved thy beauty\'s use,\\r\\nIf thou couldst answer \'This fair child of mine\\r\\nShall sum my count and make my old excuse,\'\\r\\nProving his beauty by succession thine!\\r\\nThis were to be new made when thou art old,\\r\\nAnd see thy blood warm when thou feel\'st it cold.",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>When forty winters shall beseige thy brow,<br />\\nAnd dig deep trenches in thy beauty&#039;s field,<br />\\nThy youth&#039;s proud livery, so gazed on now,<br />\\nWill be a tatter&#039;d weed, of small worth held:<br />\\nThen being ask&#039;d where all thy beauty lies,<br />\\nWhere all the treasure of thy lusty days,<br />\\nTo say, within thine own deep-sunken eyes,<br />\\nWere an all-eating shame and thriftless praise.<br />\\nHow much more praise deserved thy beauty&#039;s use,<br />\\nIf thou couldst answer &#039;This fair child of mine<br />\\nShall sum my count and make my old excuse,&#039;<br />\\nProving his beauty by succession thine!<br />\\nThis were to be new made when thou art old,<br />\\nAnd see thy blood warm when thou feel&#039;st it cold.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Sonnet II\',
            \'format\' => NULL,
            \'safe_value\' => \'Sonnet II\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
          ),
        ),
      ),
      \'rdf_mapping\' => array(
        \'rdftype\' => array(
          \'sioc:Item\',
          \'foaf:Document\',
        ),
        \'title\' => array(
          \'predicates\' => array(
            \'dc:title\',
          ),
        ),
        \'created\' => array(
          \'predicates\' => array(
            \'dc:date\',
            \'dc:created\',
          ),
          \'datatype\' => \'xsd:dateTime\',
          \'callback\' => \'date_iso8601\',
        ),
        \'changed\' => array(
          \'predicates\' => array(
            \'dc:modified\',
          ),
          \'datatype\' => \'xsd:dateTime\',
          \'callback\' => \'date_iso8601\',
        ),
        \'body\' => array(
          \'predicates\' => array(
            \'content:encoded\',
          ),
        ),
        \'uid\' => array(
          \'predicates\' => array(
            \'sioc:has_creator\',
          ),
          \'type\' => \'rel\',
        ),
        \'name\' => array(
          \'predicates\' => array(
            \'foaf:name\',
          ),
        ),
        \'comment_count\' => array(
          \'predicates\' => array(
            \'sioc:num_replies\',
          ),
          \'datatype\' => \'xsd:integer\',
        ),
        \'last_activity\' => array(
          \'predicates\' => array(
            \'sioc:last_activity_date\',
          ),
          \'datatype\' => \'xsd:dateTime\',
          \'callback\' => \'date_iso8601\',
        ),
      ),
      \'cid\' => \'0\',
      \'last_comment_timestamp\' => \'1387993938\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'2\',
      \'comment_count\' => \'0\',
      \'name\' => \'bard\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'4\',
        \'source\' => \'node/2\',
        \'alias\' => \'content/submission-sonnet-ii-bard-201312251752\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'2\',
      \'uid\' => \'2\',
      \'title\' => " Submission: A Lover\'s Complaint by bard 201312251751",
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'b822aa71-b4f2-42a0-9eca-5e07065a3fe4\',
      \'nid\' => \'1\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1387993841\',
      \'changed\' => \'1387993891\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'ad2b8bb3-7d62-4db4-96f2-d33f141c6ece\',
      \'revision_timestamp\' => \'1387993891\',
      \'revision_uid\' => \'2\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "FROM off a hill whose concave womb reworded\\r\\nA plaintful story from a sistering vale,\\r\\nMy spirits to attend this double voice accorded,\\r\\nAnd down I laid to list the sad-tuned tale;\\r\\nEre long espied a fickle maid full pale,\\r\\nTearing of papers, breaking rings a-twain,\\r\\nStorming her world with sorrow\'s wind and rain.\\r\\n\\r\\nUpon her head a platted hive of straw,\\r\\nWhich fortified her visage from the sun,\\r\\nWhereon the thought might think sometime it saw\\r\\nThe carcass of beauty spent and done:\\r\\nTime had not scythed all that youth begun,\\r\\nNor youth all quit; but, spite of heaven\'s fell rage,\\r\\nSome beauty peep\'d through lattice of sear\'d age.\\r\\nOft did she heave her napkin to her eyne,\\r\\nWhich on it had conceited characters,\\r\\nLaundering the silken figures in the brine\\r\\nThat season\'d woe had pelleted in tears,\\r\\nAnd often reading what contents it bears;\\r\\nAs often shrieking undistinguish\'d woe,\\r\\nIn clamours of all size, both high and low.\\r\\nSometimes her levell\'d eyes their carriage ride,\\r\\nAs they did battery to the spheres intend;\\r\\nSometime diverted their poor balls are tied\\r\\nTo the orbed earth; sometimes they do extend\\r\\nTheir view right on; anon their gazes lend\\r\\nTo every place at once, and, nowhere fix\'d,\\r\\nThe mind and sight distractedly commix\'d.\\r\\nHer hair, nor loose nor tied in formal plat,\\r\\nProclaim\'d in her a careless hand of pride\\r\\nFor some, untuck\'d, descended her sheaved hat,\\r\\nHanging her pale and pined cheek beside;\\r\\nSome in her threaden fillet still did bide,\\r\\nAnd true to bondage would not break from thence,\\r\\nThough slackly braided in loose negligence.\\r\\nA thousand favours from a maund she drew\\r\\nOf amber, crystal, and of beaded jet,\\r\\nWhich one by one she in a river threw,\\r\\nUpon whose weeping margent she was set;\\r\\nLike usury, applying wet to wet,\\r\\nOr monarch\'s hands that let not bounty fall\\r\\nWhere want cries some, but where excess begs all.\\r\\nOf folded schedules had she many a one,\\r\\nWhich she perused, sigh\'d, tore, and gave the flood;\\r\\nCrack\'d many a ring of posied gold and bone\\r\\nBidding them find their sepulchres in mud;\\r\\nFound yet moe letters sadly penn\'d in blood,\\r\\nWith sleided silk feat and affectedly\\r\\nEnswathed, and seal\'d to curious secrecy.\\r\\nThese often bathed she in her fluxive eyes,\\r\\nAnd often kiss\'d, and often \'gan to tear:\\r\\nCried \'O false blood, thou register of lies,\\r\\nWhat unapproved witness dost thou bear!\\r\\nInk would have seem\'d more black and damned here!\'\\r\\nThis said, in top of rage the lines she rents,\\r\\nBig discontent so breaking their contents.\\r\\nA reverend man that grazed his cattle nigh--\\r\\nSometime a blusterer, that the ruffle knew\\r\\nOf court, of city, and had let go by\\r\\nThe swiftest hours, observed as they flew--\\r\\nTowards this afflicted fancy fastly drew,\\r\\nAnd, privileged by age, desires to know\\r\\nIn brief the grounds and motives of her woe.\\r\\nSo slides he down upon his grained bat,\\r\\nAnd comely-distant sits he by her side;\\r\\nWhen he again desires her, being sat,\\r\\nHer grievance with his hearing to divide:\\r\\nIf that from him there may be aught applied\\r\\nWhich may her suffering ecstasy assuage,\\r\\n\'Tis promised in the charity of age.\\r\\n\'Father,\' she says, \'though in me you behold\\r\\nThe injury of many a blasting hour,\\r\\nLet it not tell your judgment I am old;\\r\\nNot age, but sorrow, over me hath power:\\r\\nI might as yet have been a spreading flower,\\r\\nFresh to myself, If I had self-applied\\r\\nLove to myself and to no love beside.\\r\\n\'But, woe is me! too early I attended\\r\\nA youthful suit--it was to gain my grace--\\r\\nOf one by nature\'s outwards so commended,\\r\\nThat maidens\' eyes stuck over all his face:\\r\\nLove lack\'d a dwelling, and made him her place;\\r\\nAnd when in his fair parts she did abide,\\r\\nShe was new lodged and newly deified.\\r\\n\'His browny locks did hang in crooked curls;\\r\\nAnd every light occasion of the wind\\r\\nUpon his lips their silken parcels hurls.\\r\\nWhat\'s sweet to do, to do will aptly find:\\r\\nEach eye that saw him did enchant the mind,\\r\\nFor on his visage was in little drawn\\r\\nWhat largeness thinks in Paradise was sawn.\\r\\n\'Small show of man was yet upon his chin;\\r\\nHis phoenix down began but to appear\\r\\nLike unshorn velvet on that termless skin\\r\\nWhose bare out-bragg\'d the web it seem\'d to wear:\\r\\nYet show\'d his visage by that cost more dear;\\r\\nAnd nice affections wavering stood in doubt\\r\\nIf best were as it was, or best without.\\r\\n\'His qualities were beauteous as his form,\\r\\nFor maiden-tongued he was, and thereof free;\\r\\nYet, if men moved him, was he such a storm\\r\\nAs oft \'twixt May and April is to see,\\r\\nWhen winds breathe sweet, untidy though they be.\\r\\nHis rudeness so with his authorized youth\\r\\nDid livery falseness in a pride of truth.\\r\\n\'Well could he ride, and often men would say\\r\\n\'That horse his mettle from his rider takes:\\r\\nProud of subjection, noble by the sway,\\r\\nWhat rounds, what bounds, what course, what stop\\r\\nhe makes!\'\\r\\nAnd controversy hence a question takes,\\r\\nWhether the horse by him became his deed,\\r\\nOr he his manage by the well-doing steed.\\r\\n\'But quickly on this side the verdict went:\\r\\nHis real habitude gave life and grace\\r\\nTo appertainings and to ornament,\\r\\nAccomplish\'d in himself, not in his case:\\r\\nAll aids, themselves made fairer by their place,\\r\\nCame for additions; yet their purposed trim\\r\\nPieced not his grace, but were all graced by him.\\r\\n\'So on the tip of his subduing tongue\\r\\nAll kinds of arguments and question deep,\\r\\nAll replication prompt, and reason strong,\\r\\nFor his advantage still did wake and sleep:\\r\\nTo make the weeper laugh, the laugher weep,\\r\\nHe had the dialect and different skill,\\r\\nCatching all passions in his craft of will:\\r\\n\'That he did in the general bosom reign\\r\\nOf young, of old; and sexes both enchanted,\\r\\nTo dwell with him in thoughts, or to remain\\r\\nIn personal duty, following where he haunted:\\r\\nConsents bewitch\'d, ere he desire, have granted;\\r\\nAnd dialogued for him what he would say,\\r\\nAsk\'d their own wills, and made their wills obey.\\r\\n\'Many there were that did his picture get,\\r\\nTo serve their eyes, and in it put their mind;\\r\\nLike fools that in th\' imagination set\\r\\nThe goodly objects which abroad they find\\r\\nOf lands and mansions, theirs in thought assign\'d;\\r\\nAnd labouring in moe pleasures to bestow them\\r\\nThan the true gouty landlord which doth owe them:\\r\\n\'So many have, that never touch\'d his hand,\\r\\nSweetly supposed them mistress of his heart.\\r\\nMy woeful self, that did in freedom stand,\\r\\nAnd was my own fee-simple, not in part,\\r\\nWhat with his art in youth, and youth in art,\\r\\nThrew my affections in his charmed power,\\r\\nReserved the stalk and gave him all my flower.\\r\\n\'Yet did I not, as some my equals did,\\r\\nDemand of him, nor being desired yielded;\\r\\nFinding myself in honour so forbid,\\r\\nWith safest distance I mine honour shielded:\\r\\nExperience for me many bulwarks builded\\r\\nOf proofs new-bleeding, which remain\'d the foil\\r\\nOf this false jewel, and his amorous spoil.\\r\\n\'But, ah, who ever shunn\'d by precedent\\r\\nThe destined ill she must herself assay?\\r\\nOr forced examples, \'gainst her own content,\\r\\nTo put the by-past perils in her way?\\r\\nCounsel may stop awhile what will not stay;\\r\\nFor when we rage, advice is often seen\\r\\nBy blunting us to make our wits more keen.\\r\\n\'Nor gives it satisfaction to our blood,\\r\\nThat we must curb it upon others\' proof;\\r\\nTo be forbod the sweets that seem so good,\\r\\nFor fear of harms that preach in our behoof.\\r\\nO appetite, from judgment stand aloof!\\r\\nThe one a palate hath that needs will taste,\\r\\nThough Reason weep, and cry, \'It is thy last.\'\\r\\n\'For further I could say \'This man\'s untrue,\'\\r\\nAnd knew the patterns of his foul beguiling;\\r\\nHeard where his plants in others\' orchards grew,\\r\\nSaw how deceits were gilded in his smiling;\\r\\nKnew vows were ever brokers to defiling;\\r\\nThought characters and words merely but art,\\r\\nAnd bastards of his foul adulterate heart.\\r\\n\'And long upon these terms I held my city,\\r\\nTill thus he gan besiege me: \'Gentle maid,\\r\\nHave of my suffering youth some feeling pity,\\r\\nAnd be not of my holy vows afraid:\\r\\nThat\'s to ye sworn to none was ever said;\\r\\nFor feasts of love I have been call\'d unto,\\r\\nTill now did ne\'er invite, nor never woo.\\r\\n\'\'All my offences that abroad you see\\r\\nAre errors of the blood, none of the mind;\\r\\nLove made them not: with acture they may be,\\r\\nWhere neither party is nor true nor kind:\\r\\nThey sought their shame that so their shame did find;\\r\\nAnd so much less of shame in me remains,\\r\\nBy how much of me their reproach contains.\\r\\n\'\'Among the many that mine eyes have seen,\\r\\nNot one whose flame my heart so much as warm\'d,\\r\\nOr my affection put to the smallest teen,\\r\\nOr any of my leisures ever charm\'d:\\r\\nHarm have I done to them, but ne\'er was harm\'d;\\r\\nKept hearts in liveries, but mine own was free,\\r\\nAnd reign\'d, commanding in his monarchy.\\r\\n\'\'Look here, what tributes wounded fancies sent me,\\r\\nOf paled pearls and rubies red as blood;\\r\\nFiguring that they their passions likewise lent me\\r\\nOf grief and blushes, aptly understood\\r\\nIn bloodless white and the encrimson\'d mood;\\r\\nEffects of terror and dear modesty,\\r\\nEncamp\'d in hearts, but fighting outwardly.\\r\\n\'\'And, lo, behold these talents of their hair,\\r\\nWith twisted metal amorously impleach\'d,\\r\\nI have received from many a several fair,\\r\\nTheir kind acceptance weepingly beseech\'d,\\r\\nWith the annexions of fair gems enrich\'d,\\r\\nAnd deep-brain\'d sonnets that did amplify\\r\\nEach stone\'s dear nature, worth, and quality.\\r\\n\'\'The diamond,--why, \'twas beautiful and hard,\\r\\nWhereto his invised properties did tend;\\r\\nThe deep-green emerald, in whose fresh regard\\r\\nWeak sights their sickly radiance do amend;\\r\\nThe heaven-hued sapphire and the opal blend\\r\\nWith objects manifold: each several stone,\\r\\nWith wit well blazon\'d, smiled or made some moan.\\r\\n\'\'Lo, all these trophies of affections hot,\\r\\nOf pensived and subdued desires the tender,\\r\\nNature hath charged me that I hoard them not,\\r\\nBut yield them up where I myself must render,\\r\\nThat is, to you, my origin and ender;\\r\\nFor these, of force, must your oblations be,\\r\\nSince I their altar, you enpatron me.\\r\\n\'\'O, then, advance of yours that phraseless hand,\\r\\nWhose white weighs down the airy scale of praise;\\r\\nTake all these similes to your own command,\\r\\nHallow\'d with sighs that burning lungs did raise;\\r\\nWhat me your minister, for you obeys,\\r\\nWorks under you; and to your audit comes\\r\\nTheir distract parcels in combined sums.\\r\\n\'\'Lo, this device was sent me from a nun,\\r\\nOr sister sanctified, of holiest note;\\r\\nWhich late her noble suit in court did shun,\\r\\nWhose rarest havings made the blossoms dote;\\r\\nFor she was sought by spirits of richest coat,\\r\\nBut kept cold distance, and did thence remove,\\r\\nTo spend her living in eternal love.\\r\\n\'\'But, O my sweet, what labour is\'t to leave\\r\\nThe thing we have not, mastering what not strives,\\r\\nPlaying the place which did no form receive,\\r\\nPlaying patient sports in unconstrained gyves?\\r\\nShe that her fame so to herself contrives,\\r\\nThe scars of battle \'scapeth by the flight,\\r\\nAnd makes her absence valiant, not her might.\\r\\n\'\'O, pardon me, in that my boast is true:\\r\\nThe accident which brought me to her eye\\r\\nUpon the moment did her force subdue,\\r\\nAnd now she would the caged cloister fly:\\r\\nReligious love put out Religion\'s eye:\\r\\nNot to be tempted, would she be immured,\\r\\nAnd now, to tempt, all liberty procured.\\r\\n\'\'How mighty then you are, O, hear me tell!\\r\\nThe broken bosoms that to me belong\\r\\nHave emptied all their fountains in my well,\\r\\nAnd mine I pour your ocean all among:\\r\\nI strong o\'er them, and you o\'er me being strong,\\r\\nMust for your victory us all congest,\\r\\nAs compound love to physic your cold breast.\\r\\n\'\'My parts had power to charm a sacred nun,\\r\\nWho, disciplined, ay, dieted in grace,\\r\\nBelieved her eyes when they to assail begun,\\r\\nAll vows and consecrations giving place:\\r\\nO most potential love! vow, bond, nor space,\\r\\nIn thee hath neither sting, knot, nor confine,\\r\\nFor thou art all, and all things else are thine.\\r\\n\'\'When thou impressest, what are precepts worth\\r\\nOf stale example? When thou wilt inflame,\\r\\nHow coldly those impediments stand forth\\r\\nOf wealth, of filial fear, law, kindred, fame!\\r\\nLove\'s arms are peace, \'gainst rule, \'gainst sense,\\r\\n\'gainst shame,\\r\\nAnd sweetens, in the suffering pangs it bears,\\r\\nThe aloes of all forces, shocks, and fears.\\r\\n\'\'Now all these hearts that do on mine depend,\\r\\nFeeling it break, with bleeding groans they pine;\\r\\nAnd supplicant their sighs to you extend,\\r\\nTo leave the battery that you make \'gainst mine,\\r\\nLending soft audience to my sweet design,\\r\\nAnd credent soul to that strong-bonded oath\\r\\nThat shall prefer and undertake my troth.\'\\r\\n\'This said, his watery eyes he did dismount,\\r\\nWhose sights till then were levell\'d on my face;\\r\\nEach cheek a river running from a fount\\r\\nWith brinish current downward flow\'d apace:\\r\\nO, how the channel to the stream gave grace!\\r\\nWho glazed with crystal gate the glowing roses\\r\\nThat flame through water which their hue encloses.\\r\\n\'O father, what a hell of witchcraft lies\\r\\nIn the small orb of one particular tear!\\r\\nBut with the inundation of the eyes\\r\\nWhat rocky heart to water will not wear?\\r\\nWhat breast so cold that is not warmed here?\\r\\nO cleft effect! cold modesty, hot wrath,\\r\\nBoth fire from hence and chill extincture hath.\\r\\n\'For, lo, his passion, but an art of craft,\\r\\nEven there resolved my reason into tears;\\r\\nThere my white stole of chastity I daff\'d,\\r\\nShook off my sober guards and civil fears;\\r\\nAppear to him, as he to me appears,\\r\\nAll melting; though our drops this difference bore,\\r\\nHis poison\'d me, and mine did him restore.\\r\\n\'In him a plenitude of subtle matter,\\r\\nApplied to cautels, all strange forms receives,\\r\\nOf burning blushes, or of weeping water,\\r\\nOr swooning paleness; and he takes and leaves,\\r\\nIn either\'s aptness, as it best deceives,\\r\\nTo blush at speeches rank to weep at woes,\\r\\nOr to turn white and swoon at tragic shows.\\r\\n\'That not a heart which in his level came\\r\\nCould \'scape the hail of his all-hurting aim,\\r\\nShowing fair nature is both kind and tame;\\r\\nAnd, veil\'d in them, did win whom he would maim:\\r\\nAgainst the thing he sought he would exclaim;\\r\\nWhen he most burn\'d in heart-wish\'d luxury,\\r\\nHe preach\'d pure maid, and praised cold chastity.\\r\\n\'Thus merely with the garment of a Grace\\r\\nThe naked and concealed fiend he cover\'d;\\r\\nThat th\' unexperient gave the tempter place,\\r\\nWhich like a cherubin above them hover\'d.\\r\\nWho, young and simple, would not be so lover\'d?\\r\\nAy me! I fell; and yet do question make\\r\\nWhat I should do again for such a sake.\\r\\n\'O, that infected moisture of his eye,\\r\\nO, that false fire which in his cheek so glow\'d,\\r\\nO, that forced thunder from his heart did fly,\\r\\nO, that sad breath his spongy lungs bestow\'d,\\r\\nO, all that borrow\'d motion seeming owed,\\r\\nWould yet again betray the fore-betray\'d,\\r\\nAnd new pervert a reconciled maid!\'",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>FROM off a hill whose concave womb reworded<br />\\nA plaintful story from a sistering vale,<br />\\nMy spirits to attend this double voice accorded,<br />\\nAnd down I laid to list the sad-tuned tale;<br />\\nEre long espied a fickle maid full pale,<br />\\nTearing of papers, breaking rings a-twain,<br />\\nStorming her world with sorrow&#039;s wind and rain.</p>\\n<p>Upon her head a platted hive of straw,<br />\\nWhich fortified her visage from the sun,<br />\\nWhereon the thought might think sometime it saw<br />\\nThe carcass of beauty spent and done:<br />\\nTime had not scythed all that youth begun,<br />\\nNor youth all quit; but, spite of heaven&#039;s fell rage,<br />\\nSome beauty peep&#039;d through lattice of sear&#039;d age.<br />\\nOft did she heave her napkin to her eyne,<br />\\nWhich on it had conceited characters,<br />\\nLaundering the silken figures in the brine<br />\\nThat season&#039;d woe had pelleted in tears,<br />\\nAnd often reading what contents it bears;<br />\\nAs often shrieking undistinguish&#039;d woe,<br />\\nIn clamours of all size, both high and low.<br />\\nSometimes her levell&#039;d eyes their carriage ride,<br />\\nAs they did battery to the spheres intend;<br />\\nSometime diverted their poor balls are tied<br />\\nTo the orbed earth; sometimes they do extend<br />\\nTheir view right on; anon their gazes lend<br />\\nTo every place at once, and, nowhere fix&#039;d,<br />\\nThe mind and sight distractedly commix&#039;d.<br />\\nHer hair, nor loose nor tied in formal plat,<br />\\nProclaim&#039;d in her a careless hand of pride<br />\\nFor some, untuck&#039;d, descended her sheaved hat,<br />\\nHanging her pale and pined cheek beside;<br />\\nSome in her threaden fillet still did bide,<br />\\nAnd true to bondage would not break from thence,<br />\\nThough slackly braided in loose negligence.<br />\\nA thousand favours from a maund she drew<br />\\nOf amber, crystal, and of beaded jet,<br />\\nWhich one by one she in a river threw,<br />\\nUpon whose weeping margent she was set;<br />\\nLike usury, applying wet to wet,<br />\\nOr monarch&#039;s hands that let not bounty fall<br />\\nWhere want cries some, but where excess begs all.<br />\\nOf folded schedules had she many a one,<br />\\nWhich she perused, sigh&#039;d, tore, and gave the flood;<br />\\nCrack&#039;d many a ring of posied gold and bone<br />\\nBidding them find their sepulchres in mud;<br />\\nFound yet moe letters sadly penn&#039;d in blood,<br />\\nWith sleided silk feat and affectedly<br />\\nEnswathed, and seal&#039;d to curious secrecy.<br />\\nThese often bathed she in her fluxive eyes,<br />\\nAnd often kiss&#039;d, and often &#039;gan to tear:<br />\\nCried &#039;O false blood, thou register of lies,<br />\\nWhat unapproved witness dost thou bear!<br />\\nInk would have seem&#039;d more black and damned here!&#039;<br />\\nThis said, in top of rage the lines she rents,<br />\\nBig discontent so breaking their contents.<br />\\nA reverend man that grazed his cattle nigh--<br />\\nSometime a blusterer, that the ruffle knew<br />\\nOf court, of city, and had let go by<br />\\nThe swiftest hours, observed as they flew--<br />\\nTowards this afflicted fancy fastly drew,<br />\\nAnd, privileged by age, desires to know<br />\\nIn brief the grounds and motives of her woe.<br />\\nSo slides he down upon his grained bat,<br />\\nAnd comely-distant sits he by her side;<br />\\nWhen he again desires her, being sat,<br />\\nHer grievance with his hearing to divide:<br />\\nIf that from him there may be aught applied<br />\\nWhich may her suffering ecstasy assuage,<br />\\n&#039;Tis promised in the charity of age.<br />\\n&#039;Father,&#039; she says, &#039;though in me you behold<br />\\nThe injury of many a blasting hour,<br />\\nLet it not tell your judgment I am old;<br />\\nNot age, but sorrow, over me hath power:<br />\\nI might as yet have been a spreading flower,<br />\\nFresh to myself, If I had self-applied<br />\\nLove to myself and to no love beside.<br />\\n&#039;But, woe is me! too early I attended<br />\\nA youthful suit--it was to gain my grace--<br />\\nOf one by nature&#039;s outwards so commended,<br />\\nThat maidens&#039; eyes stuck over all his face:<br />\\nLove lack&#039;d a dwelling, and made him her place;<br />\\nAnd when in his fair parts she did abide,<br />\\nShe was new lodged and newly deified.<br />\\n&#039;His browny locks did hang in crooked curls;<br />\\nAnd every light occasion of the wind<br />\\nUpon his lips their silken parcels hurls.<br />\\nWhat&#039;s sweet to do, to do will aptly find:<br />\\nEach eye that saw him did enchant the mind,<br />\\nFor on his visage was in little drawn<br />\\nWhat largeness thinks in Paradise was sawn.<br />\\n&#039;Small show of man was yet upon his chin;<br />\\nHis phoenix down began but to appear<br />\\nLike unshorn velvet on that termless skin<br />\\nWhose bare out-bragg&#039;d the web it seem&#039;d to wear:<br />\\nYet show&#039;d his visage by that cost more dear;<br />\\nAnd nice affections wavering stood in doubt<br />\\nIf best were as it was, or best without.<br />\\n&#039;His qualities were beauteous as his form,<br />\\nFor maiden-tongued he was, and thereof free;<br />\\nYet, if men moved him, was he such a storm<br />\\nAs oft &#039;twixt May and April is to see,<br />\\nWhen winds breathe sweet, untidy though they be.<br />\\nHis rudeness so with his authorized youth<br />\\nDid livery falseness in a pride of truth.<br />\\n&#039;Well could he ride, and often men would say<br />\\n&#039;That horse his mettle from his rider takes:<br />\\nProud of subjection, noble by the sway,<br />\\nWhat rounds, what bounds, what course, what stop<br />\\nhe makes!&#039;<br />\\nAnd controversy hence a question takes,<br />\\nWhether the horse by him became his deed,<br />\\nOr he his manage by the well-doing steed.<br />\\n&#039;But quickly on this side the verdict went:<br />\\nHis real habitude gave life and grace<br />\\nTo appertainings and to ornament,<br />\\nAccomplish&#039;d in himself, not in his case:<br />\\nAll aids, themselves made fairer by their place,<br />\\nCame for additions; yet their purposed trim<br />\\nPieced not his grace, but were all graced by him.<br />\\n&#039;So on the tip of his subduing tongue<br />\\nAll kinds of arguments and question deep,<br />\\nAll replication prompt, and reason strong,<br />\\nFor his advantage still did wake and sleep:<br />\\nTo make the weeper laugh, the laugher weep,<br />\\nHe had the dialect and different skill,<br />\\nCatching all passions in his craft of will:<br />\\n&#039;That he did in the general bosom reign<br />\\nOf young, of old; and sexes both enchanted,<br />\\nTo dwell with him in thoughts, or to remain<br />\\nIn personal duty, following where he haunted:<br />\\nConsents bewitch&#039;d, ere he desire, have granted;<br />\\nAnd dialogued for him what he would say,<br />\\nAsk&#039;d their own wills, and made their wills obey.<br />\\n&#039;Many there were that did his picture get,<br />\\nTo serve their eyes, and in it put their mind;<br />\\nLike fools that in th&#039; imagination set<br />\\nThe goodly objects which abroad they find<br />\\nOf lands and mansions, theirs in thought assign&#039;d;<br />\\nAnd labouring in moe pleasures to bestow them<br />\\nThan the true gouty landlord which doth owe them:<br />\\n&#039;So many have, that never touch&#039;d his hand,<br />\\nSweetly supposed them mistress of his heart.<br />\\nMy woeful self, that did in freedom stand,<br />\\nAnd was my own fee-simple, not in part,<br />\\nWhat with his art in youth, and youth in art,<br />\\nThrew my affections in his charmed power,<br />\\nReserved the stalk and gave him all my flower.<br />\\n&#039;Yet did I not, as some my equals did,<br />\\nDemand of him, nor being desired yielded;<br />\\nFinding myself in honour so forbid,<br />\\nWith safest distance I mine honour shielded:<br />\\nExperience for me many bulwarks builded<br />\\nOf proofs new-bleeding, which remain&#039;d the foil<br />\\nOf this false jewel, and his amorous spoil.<br />\\n&#039;But, ah, who ever shunn&#039;d by precedent<br />\\nThe destined ill she must herself assay?<br />\\nOr forced examples, &#039;gainst her own content,<br />\\nTo put the by-past perils in her way?<br />\\nCounsel may stop awhile what will not stay;<br />\\nFor when we rage, advice is often seen<br />\\nBy blunting us to make our wits more keen.<br />\\n&#039;Nor gives it satisfaction to our blood,<br />\\nThat we must curb it upon others&#039; proof;<br />\\nTo be forbod the sweets that seem so good,<br />\\nFor fear of harms that preach in our behoof.<br />\\nO appetite, from judgment stand aloof!<br />\\nThe one a palate hath that needs will taste,<br />\\nThough Reason weep, and cry, &#039;It is thy last.&#039;<br />\\n&#039;For further I could say &#039;This man&#039;s untrue,&#039;<br />\\nAnd knew the patterns of his foul beguiling;<br />\\nHeard where his plants in others&#039; orchards grew,<br />\\nSaw how deceits were gilded in his smiling;<br />\\nKnew vows were ever brokers to defiling;<br />\\nThought characters and words merely but art,<br />\\nAnd bastards of his foul adulterate heart.<br />\\n&#039;And long upon these terms I held my city,<br />\\nTill thus he gan besiege me: &#039;Gentle maid,<br />\\nHave of my suffering youth some feeling pity,<br />\\nAnd be not of my holy vows afraid:<br />\\nThat&#039;s to ye sworn to none was ever said;<br />\\nFor feasts of love I have been call&#039;d unto,<br />\\nTill now did ne&#039;er invite, nor never woo.<br />\\n&#039;&#039;All my offences that abroad you see<br />\\nAre errors of the blood, none of the mind;<br />\\nLove made them not: with acture they may be,<br />\\nWhere neither party is nor true nor kind:<br />\\nThey sought their shame that so their shame did find;<br />\\nAnd so much less of shame in me remains,<br />\\nBy how much of me their reproach contains.<br />\\n&#039;&#039;Among the many that mine eyes have seen,<br />\\nNot one whose flame my heart so much as warm&#039;d,<br />\\nOr my affection put to the smallest teen,<br />\\nOr any of my leisures ever charm&#039;d:<br />\\nHarm have I done to them, but ne&#039;er was harm&#039;d;<br />\\nKept hearts in liveries, but mine own was free,<br />\\nAnd reign&#039;d, commanding in his monarchy.<br />\\n&#039;&#039;Look here, what tributes wounded fancies sent me,<br />\\nOf paled pearls and rubies red as blood;<br />\\nFiguring that they their passions likewise lent me<br />\\nOf grief and blushes, aptly understood<br />\\nIn bloodless white and the encrimson&#039;d mood;<br />\\nEffects of terror and dear modesty,<br />\\nEncamp&#039;d in hearts, but fighting outwardly.<br />\\n&#039;&#039;And, lo, behold these talents of their hair,<br />\\nWith twisted metal amorously impleach&#039;d,<br />\\nI have received from many a several fair,<br />\\nTheir kind acceptance weepingly beseech&#039;d,<br />\\nWith the annexions of fair gems enrich&#039;d,<br />\\nAnd deep-brain&#039;d sonnets that did amplify<br />\\nEach stone&#039;s dear nature, worth, and quality.<br />\\n&#039;&#039;The diamond,--why, &#039;twas beautiful and hard,<br />\\nWhereto his invised properties did tend;<br />\\nThe deep-green emerald, in whose fresh regard<br />\\nWeak sights their sickly radiance do amend;<br />\\nThe heaven-hued sapphire and the opal blend<br />\\nWith objects manifold: each several stone,<br />\\nWith wit well blazon&#039;d, smiled or made some moan.<br />\\n&#039;&#039;Lo, all these trophies of affections hot,<br />\\nOf pensived and subdued desires the tender,<br />\\nNature hath charged me that I hoard them not,<br />\\nBut yield them up where I myself must render,<br />\\nThat is, to you, my origin and ender;<br />\\nFor these, of force, must your oblations be,<br />\\nSince I their altar, you enpatron me.<br />\\n&#039;&#039;O, then, advance of yours that phraseless hand,<br />\\nWhose white weighs down the airy scale of praise;<br />\\nTake all these similes to your own command,<br />\\nHallow&#039;d with sighs that burning lungs did raise;<br />\\nWhat me your minister, for you obeys,<br />\\nWorks under you; and to your audit comes<br />\\nTheir distract parcels in combined sums.<br />\\n&#039;&#039;Lo, this device was sent me from a nun,<br />\\nOr sister sanctified, of holiest note;<br />\\nWhich late her noble suit in court did shun,<br />\\nWhose rarest havings made the blossoms dote;<br />\\nFor she was sought by spirits of richest coat,<br />\\nBut kept cold distance, and did thence remove,<br />\\nTo spend her living in eternal love.<br />\\n&#039;&#039;But, O my sweet, what labour is&#039;t to leave<br />\\nThe thing we have not, mastering what not strives,<br />\\nPlaying the place which did no form receive,<br />\\nPlaying patient sports in unconstrained gyves?<br />\\nShe that her fame so to herself contrives,<br />\\nThe scars of battle &#039;scapeth by the flight,<br />\\nAnd makes her absence valiant, not her might.<br />\\n&#039;&#039;O, pardon me, in that my boast is true:<br />\\nThe accident which brought me to her eye<br />\\nUpon the moment did her force subdue,<br />\\nAnd now she would the caged cloister fly:<br />\\nReligious love put out Religion&#039;s eye:<br />\\nNot to be tempted, would she be immured,<br />\\nAnd now, to tempt, all liberty procured.<br />\\n&#039;&#039;How mighty then you are, O, hear me tell!<br />\\nThe broken bosoms that to me belong<br />\\nHave emptied all their fountains in my well,<br />\\nAnd mine I pour your ocean all among:<br />\\nI strong o&#039;er them, and you o&#039;er me being strong,<br />\\nMust for your victory us all congest,<br />\\nAs compound love to physic your cold breast.<br />\\n&#039;&#039;My parts had power to charm a sacred nun,<br />\\nWho, disciplined, ay, dieted in grace,<br />\\nBelieved her eyes when they to assail begun,<br />\\nAll vows and consecrations giving place:<br />\\nO most potential love! vow, bond, nor space,<br />\\nIn thee hath neither sting, knot, nor confine,<br />\\nFor thou art all, and all things else are thine.<br />\\n&#039;&#039;When thou impressest, what are precepts worth<br />\\nOf stale example? When thou wilt inflame,<br />\\nHow coldly those impediments stand forth<br />\\nOf wealth, of filial fear, law, kindred, fame!<br />\\nLove&#039;s arms are peace, &#039;gainst rule, &#039;gainst sense,<br />\\n&#039;gainst shame,<br />\\nAnd sweetens, in the suffering pangs it bears,<br />\\nThe aloes of all forces, shocks, and fears.<br />\\n&#039;&#039;Now all these hearts that do on mine depend,<br />\\nFeeling it break, with bleeding groans they pine;<br />\\nAnd supplicant their sighs to you extend,<br />\\nTo leave the battery that you make &#039;gainst mine,<br />\\nLending soft audience to my sweet design,<br />\\nAnd credent soul to that strong-bonded oath<br />\\nThat shall prefer and undertake my troth.&#039;<br />\\n&#039;This said, his watery eyes he did dismount,<br />\\nWhose sights till then were levell&#039;d on my face;<br />\\nEach cheek a river running from a fount<br />\\nWith brinish current downward flow&#039;d apace:<br />\\nO, how the channel to the stream gave grace!<br />\\nWho glazed with crystal gate the glowing roses<br />\\nThat flame through water which their hue encloses.<br />\\n&#039;O father, what a hell of witchcraft lies<br />\\nIn the small orb of one particular tear!<br />\\nBut with the inundation of the eyes<br />\\nWhat rocky heart to water will not wear?<br />\\nWhat breast so cold that is not warmed here?<br />\\nO cleft effect! cold modesty, hot wrath,<br />\\nBoth fire from hence and chill extincture hath.<br />\\n&#039;For, lo, his passion, but an art of craft,<br />\\nEven there resolved my reason into tears;<br />\\nThere my white stole of chastity I daff&#039;d,<br />\\nShook off my sober guards and civil fears;<br />\\nAppear to him, as he to me appears,<br />\\nAll melting; though our drops this difference bore,<br />\\nHis poison&#039;d me, and mine did him restore.<br />\\n&#039;In him a plenitude of subtle matter,<br />\\nApplied to cautels, all strange forms receives,<br />\\nOf burning blushes, or of weeping water,<br />\\nOr swooning paleness; and he takes and leaves,<br />\\nIn either&#039;s aptness, as it best deceives,<br />\\nTo blush at speeches rank to weep at woes,<br />\\nOr to turn white and swoon at tragic shows.<br />\\n&#039;That not a heart which in his level came<br />\\nCould &#039;scape the hail of his all-hurting aim,<br />\\nShowing fair nature is both kind and tame;<br />\\nAnd, veil&#039;d in them, did win whom he would maim:<br />\\nAgainst the thing he sought he would exclaim;<br />\\nWhen he most burn&#039;d in heart-wish&#039;d luxury,<br />\\nHe preach&#039;d pure maid, and praised cold chastity.<br />\\n&#039;Thus merely with the garment of a Grace<br />\\nThe naked and concealed fiend he cover&#039;d;<br />\\nThat th&#039; unexperient gave the tempter place,<br />\\nWhich like a cherubin above them hover&#039;d.<br />\\nWho, young and simple, would not be so lover&#039;d?<br />\\nAy me! I fell; and yet do question make<br />\\nWhat I should do again for such a sake.<br />\\n&#039;O, that infected moisture of his eye,<br />\\nO, that false fire which in his cheek so glow&#039;d,<br />\\nO, that forced thunder from his heart did fly,<br />\\nO, that sad breath his spongy lungs bestow&#039;d,<br />\\nO, all that borrow&#039;d motion seeming owed,<br />\\nWould yet again betray the fore-betray&#039;d,<br />\\nAnd new pervert a reconciled maid!&#039;</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => "A Lover\'s Complaint",
            \'format\' => NULL,
            \'safe_value\' => \'A Lover&#039;s Complaint\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
          ),
        ),
      ),
      \'rdf_mapping\' => array(
        \'rdftype\' => array(
          \'sioc:Item\',
          \'foaf:Document\',
        ),
        \'title\' => array(
          \'predicates\' => array(
            \'dc:title\',
          ),
        ),
        \'created\' => array(
          \'predicates\' => array(
            \'dc:date\',
            \'dc:created\',
          ),
          \'datatype\' => \'xsd:dateTime\',
          \'callback\' => \'date_iso8601\',
        ),
        \'changed\' => array(
          \'predicates\' => array(
            \'dc:modified\',
          ),
          \'datatype\' => \'xsd:dateTime\',
          \'callback\' => \'date_iso8601\',
        ),
        \'body\' => array(
          \'predicates\' => array(
            \'content:encoded\',
          ),
        ),
        \'uid\' => array(
          \'predicates\' => array(
            \'sioc:has_creator\',
          ),
          \'type\' => \'rel\',
        ),
        \'name\' => array(
          \'predicates\' => array(
            \'foaf:name\',
          ),
        ),
        \'comment_count\' => array(
          \'predicates\' => array(
            \'sioc:num_replies\',
          ),
          \'datatype\' => \'xsd:integer\',
        ),
        \'last_activity\' => array(
          \'predicates\' => array(
            \'sioc:last_activity_date\',
          ),
          \'datatype\' => \'xsd:dateTime\',
          \'callback\' => \'date_iso8601\',
        ),
      ),
      \'cid\' => \'0\',
      \'last_comment_timestamp\' => \'1387993841\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'2\',
      \'comment_count\' => \'0\',
      \'name\' => \'bard\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'3\',
        \'source\' => \'node/1\',
        \'alias\' => \'content/submission-lovers-complaint-bard-201312251751\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
)',
);
  return $node_export;
}
