[
  This Brainfuck program is equivalent to the following JavaScript code:

  function (input) {
    if (input === "red") {
      return "Y";
    }
    return "N";
  }

  Assumptions:
  - EOF is denoted as the null character (byte(0)) and no other character can occur after byte(0)
]

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++                           Set cell #0 to equal "Y"
>                                                                                                                   Move to cell #1
-                                                                                                                   Set cell #1 to 255
>                                                                                                                   Move to cell #2
,                                                                                                                   Read byte into cell #2
------------------------------------------------------------------------------------------------------------------  Truncate cell #2 to 0 if first character is "r"; nonzero otherwise
>                                                                                                                   Move to cell #3
,                                                                                                                   Read byte into cell #3
-----------------------------------------------------------------------------------------------------               Truncate cell #3 to 0 if second character is "e"; nonzero otherwise
>                                                                                                                   Move to cell #4
,                                                                                                                   Read byte into cell #4
----------------------------------------------------------------------------------------------------                Truncate cell #4 to 0 if third character is "d"; nonzero otherwise
>                                                                                                                   Move to cell #5
,                                                                                                                   Read byte into cell #5; if EOF reached cell #5 will be 0; nonzero otherwise
>                                                                                                                   Move to cell #6
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++                                      Set cell #6 to "N"
<                                                                                                                   Goto cell #5
[[-]<[-]<[-]<[-]>>>>.[-]<<<<<[+]>>>>>]                                                                              If cell #5 is nonzero then clear cells #2 through #5 and print "N"; clear cell #1 too
<                                                                                                                   Goto cell #4
[[-]<[-]<[-]>>>>.[-]<<<<<[+]>>>>>]                                                                                  If cell #4 is nonzero then clear cells #2 through #4 and print "N"; clear cell #1 too
<                                                                                                                   Goto cell #3
[[-]<[-]>>>>.[-]<<<<<[+]>>>>>]                                                                                      If cell #3 is nonzero then clear cells #2 and #3 then print "N"; clear cell #1 too
<                                                                                                                   Goto cell #2
[[-]>>>>.[-]<<<<<[+]>>>>>]                                                                                          If cell #2 is nonzero then clear cell #2 and print "N"; clear cell #1 too
<                                                                                                                   Goto cell #1
[[+]<.>]                                                                                                            If cell #1 is still nonzero then goto cell #0 and print "Y"
