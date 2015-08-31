# BetterHelpChallenge


<<<<<<< HEAD
The main problem was the way I checked for an a checkbox array in the POST variable.

At first I checked if each POST item's length was >1
  which doesn't work when only 1 check box is checked :)
  
  
Tested more by adding more questions, and changing their order
=======
source of problem - 'application/controllers/results.php' lines 24-31

The main problem was how I looked for arrays in POST from the checkbox questions.

At first, I checked by comparing if the length of each POST item was >1 
and then looping through each element and pushing to a new array : if(count(arr)>1){...}
  this fails when a user only selects one choice for a checkbox question: 
  count(arr)>1 will be false and attempt to add an array to the DB
  
  I noticed this was happening and changed the code in the else statement :  else{...}    //if(not >1)
  so it would add choice[0] as a quick fix which turned out to be a bust. 
>>>>>>> 643707abb53cd278d99bbd2bfcfbf676c07700e6
