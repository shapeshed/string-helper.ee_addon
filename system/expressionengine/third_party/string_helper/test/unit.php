<?php
/** 
 * A Crude Test Suite for string_helper plugin. 
 * Paste this into an empty ExpressionEngine template
 * PHP parsing needs to be on.
 */
 $passes = 0;
 $failures = 0;
?>


<h1>Test Suite for String Helper</h1>


<h2>addcslashes</h2>
<p><strong>{exp:string_helper:addcslashes addcslashes_charlist="A..z"}foo[ ]{/exp:string_helper:addcslashes}</strong></p>

<?php

  $test_string = '{exp:string_helper:addcslashes addcslashes_charlist="A..z"} foo[ ]{/exp:string_helper:addcslashes}';
  if ($test_string == "\f\o\o\[ \]"){
    echo "<p><strong>PASS</strong></p>";
    $passes++;
  }
  else{
    echo "<p><strong>FAIL</strong></p>";  
    $failures++;
  }
  
?>

<h2>addslashes</h2>
<p>{exp:string_helper:addslashes}Is your name O'reilly?{/exp:string_helper:addslashes}</p>

<?php

  $test_string = "{exp:string_helper:addslashes}Is your name O'reilly?{/exp:string_helper:addslashes}";
  if ($test_string == "Is your name O\'reilly?"){
    echo "<p><strong>PASS</strong></p>";
    $passes++;
  }
  else{
    echo "<p><strong>FAIL</strong></p>";  
    $failures++;
  }
  
?>

<h2>bin2hex</h2>
<p>{exp:string_helper:bin2hex}11111001{/exp:string_helper:bin2hex}</p>

<?php

  $test_string = '{exp:string_helper:bin2hex}11111001{/exp:string_helper:bin2hex}';
  if ($test_string == "3131313131303031"){
    echo "<p><strong>PASS</strong></p>";
    $passes++;
  }
  else{
    echo "<p><strong>FAIL</strong></p>";  
    $failures++;
  }
  
?>

<h2>chop</h2>
<p>{exp:string_helper:chop}The lazy red fox             {/exp:string_helper:chop} this should be snug to fox</p>

<?php

  $test_string = '{exp:string_helper:chop}The lazy red fox             {/exp:string_helper:chop}';
  if ($test_string == "The lazy red fox"){
    echo "<p><strong>PASS</strong></p>";
    $passes++;
  }
  else{
    echo "<p><strong>FAIL</strong></p>";  
    $failures++;
  }  
?>


<h2>chr</h2>
<p>{exp:string_helper:chr}33{/exp:string_helper:chr} Should show an exclamation mark</p>
<h2>chunk_split</h2>
<ul>
<li>Default - no chunklen or end {exp:string_helper:chunk_split}Foo bar{/exp:string_helper:chunk_split} </li>
<li>Chunklen set to 1 no end {exp:string_helper:chunk_split chunklen="1"}Foo bar{/exp:string_helper:chunk_split} </li>
<li>Chunklen set to 1 and end set to a period{exp:string_helper:chunk_split chunklen="1" end="."}Foo bar{/exp:string_helper:chunk_split} </li>
</ul>

<?php
  $test_string = '{exp:string_helper:chunk_split}Foo bar{/exp:string_helper:chunk_split}';
  if ($test_string == "Foo bar"){
    echo "<p><strong>PASS</strong></p>";
    $passes++;
  }
  else{
    echo "<p><strong>FAIL</strong></p>";  
    $failures++;
  }  
  
  $test_string = '{exp:string_helper:chunk_split chunklen="1"}Foo bar{/exp:string_helper:chunk_split}';
  if ($test_string == "F
  o
  o

  b
  a
  r"){
    echo "<p><strong>PASS</strong></p>";
    $passes++;
  }
  else{
    echo "<p><strong>FAIL</strong></p>";  
    $failures++;
  }
  
  $test_string = '{exp:string_helper:chunk_split chunklen="1" end="."}Foo bar{/exp:string_helper:chunk_split}';
  if ($test_string == "F.o.o. .b.a.r. "){
    echo "<p><strong>PASS</strong></p>";
    $passes++;
  }
  else{
    echo "<p><strong>FAIL</strong></p>";  
    $failures++;
  }
?>

<h2>str_replace</h2>
<p>{exp:string_helper:str_replace search="findme" replace="replaceme"}Here it comes [findme]{/exp:string_helper:str_replace}</p>

<?php

  $test_string = '{exp:string_helper:str_replace search="findme" replace="replaceme"}Here it comes [findme]{/exp:string_helper:str_replace}';
  if ($test_string == "Here it comes [replaceme]"){
    echo "<p><strong>PASS</strong></p>";
    $passes++;
  }
  else{
    echo "<p><strong>FAIL</strong></p>";  
    $failures++;
  }  
?>


<h2>str_word_count</h2>
<p>{exp:string_helper:str_word_count}This has five words{/exp:string_helper:str_word_count} - Should show the number 4</p>
<?php

  $test_string = '{exp:string_helper:str_word_count}This has five words{/exp:string_helper:str_word_count}';
  if ($test_string == "4"){
    echo "<p><strong>PASS</strong></p>";
    $passes++;
  }
  else{
    echo "<p><strong>FAIL</strong></p>";  
    $failures++;
  }  
?>
<h2>Trim</h2>
<p>This should trim the white space from around the word hello {exp:string_helper:trim}          hello {/exp:string_helper:trim}. Did it work?</p>
<?php

  $test_string = '{exp:string_helper:trim}          hello {/exp:string_helper:trim}';
  if ($test_string == "hello"){
    echo "<p><strong>PASS</strong></p>";
    $passes++;
  }
  else{
    echo "<p><strong>FAIL</strong></p>";  
    $failures++;
  }  
?>

<?php
  echo "<p>Test Results: $passes Passes, $failures Failures";
?>



