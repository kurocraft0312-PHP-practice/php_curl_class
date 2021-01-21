<?php
// libxml_use_internal_errors(true);

$string = <<<XML
<?xml version='1.0'?> 
<document>
 <title>Forty What?</title>
 <from>Joe</from>
 <to>Jane</to>
 <body>
  I know that's the answer -- but what's the question?
 </body>
</document>
XML;

$xml = simplexml_load_string($string);

print_r($xml);

// $obj = simplexml_load_string($xml);
// var_dump($obj);
// $xml = <<<EOX
// <elements>
//   <parent>
//     <control>0</control>
//     <code>111111</code>
//     <name>John Doe</name>
//     <children>
//       <child>
//         <child_code>1111110</child_code>
//         <grand_children>
//           <grand_child>
//             <grand_child_code>001</grand_child_code>
//             <age>15</age>
//           </grand_child>
//           <grand_child>
//             <grand_child_code></grand_child_code>
//             <age>10</age>
//           </grand_child>
//         </grand_children>
//       </child>
//     </children>
//   </parent>
// </elements>
// EOX;
?>