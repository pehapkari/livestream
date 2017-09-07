<?php

$container = require __DIR__ . '/../app/bootstrap.php';
\Tracy\Debugger::enable(false);
/** @var \App\Model\ArticleManager $articleManager */
$articleManager = $container->getByType(\App\Model\ArticleManager::class);

$articles = [
	[
		'id' => 1,
		'title' => 'V noci se převalujete a špatně spíte? Hrozí vám infarkt',
		'text' => 'Přerývaný spánek by měl být považován za varovné znamení blížících se zdravotních problémů. Studie, jíž se zúčastnilo 13 000 lidí, prokázala, že u lidí, kteří se v noci opakovaně budí, je o 99 % větší pravděpodobnost, že je potká ischemická choroba srdeční. Ta může vést až k infarktu, jelikož způsobuje horší průchodnost cév vedoucích k srdci. U lidí, kterým usínání zabralo více než půl hodiny, je o 52 % vyšší riziko infarktu a o 48 % vyšší riziko mrtvice. A aby špatných zpráv nebylo dost, tak ti, kteří v noci spí méně než šest hodin, mají pravděpodobnost infarktu vyšší o 24 %.'
	],
	[
		'id' => 2,
		'title' => 'Pro vydání Babiše a Faltýnka k trestnímu stíhání bude skoro celá Sněmovna',
		'text' => '„Je nepředstavitelné, že o tom vůbec musíme hlasovat. V západoevropských zemích by poslanci už dávno složili svůj mandát,“ glosoval předseda poslaneckého klubu TOP 09 Michal Kučera. Poslanec Martin Plíšek z topky vzápětí dodal, že žádost policie o vydání poslanců strana podpoří ze dvou důvodů. Prvním je, že žádost se týká období, kdy ani Babiš, ani Faltýnek nebyli členy dolní komory. Druhým, že jejich vydáním není nijak ohroženo fungování Sněmovny.'
	],
	[
		'id' => 3,
		'title' => 'Německé vedení Lidlu lituje umazávání křížů v letácích',
		'text' => '„Je nám velice líto, že aktuální design (obalu) vyvolal nespokojenost. Není za tím žádný špatný úmysl,” uvedla podle agentury DPA Isabela Lehmannová. Poukázala přitom na skutečnost, že se dotyčné zboží prodává už deset let po celé Evropě a jeho obal se neustále obměňuje. Podle kardinála Duky jde o bezprecedentní a nekulturní akt. [celá zpráva] Mluvčí Lidlu Holá už v pátek uvedla, že součástí obchodní politiky řetězce jako mezinárodní obchodní společnosti je zachování náboženské a politické neutrality. Dodala, že aktuální zkušenost bude firma do budoucna brát při tvorbě dalších návrhů obalů v potaz. [celá zpráva]'
	],
	[
		'id' => 4,
		'title' => 'Novináři magazínu zaplatí 200 000 eur za fotky polonahé vévodkyně Kate',
		'text' => 'Novináři bulvárního časopisu Closer, kteří se podíleli na zveřejnění fotek polonahé vévodkyně z Cambridge, musí zaplatit na pokutách a odškodném 200 000 eur (5,4 miliónu korun). Soud v Nanterre u Paříže v úterý rozhodl, že narušili soukromí vévodkyně Kate a prince Williama. Členové britské královské rodiny obdrží ale jen necelou polovinu sumy, druhá poputuje francouzskému státu ve formě pokut.'
	],
	[
		'id' => 5,
		'title' => 'Poslanci po průtazích odsouhlasili pařížskou klimatickou dohodu',
		'text' => 'Poslanecká sněmovna v úterý schválila pařížskou klimatickou dohodu, která je namířena proti globálnímu oteplování. Opoziční ODS se nepodařilo odročit rozhodování o smlouvě o rok. Horní komora přijetí dohody podpořila už na jaře. Nyní ji dostane k podpisu prezident. Oteplování se má podle textu dohody udržet pod dvěma stupni Celsia, nejlépe do 1,5 stupně ve srovnání s předindustriálním obdobím. Signatáři dohody se zavázali, že proto dále výrazně omezí emise, především oxidu uhličitého. Pařížský dokument nahrazuje Kjótský protokol z roku 1997. V dolní komoře se projednávání smlouvy, která signatáře zavazuje ke snižování emisí skleníkových plynů, protahovalo. Do zahraničního výboru a do výboru pro životní prostředí ji poslanci postoupili až na pátý pokus úvodního kola debaty. Oba výbory souhlas s ratifikací dohody doporučily.'
	]
];

foreach ($articles as $article) {
	$articleManager->addArticle($article['title'], $article['text']);
}

echo "everything indexed";
