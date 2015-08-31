# BetterHelpChallenge

source of problem - 'application/controllers/results.php' lines 24-31

The main problem was how I looked for arrays in POST from the checkbox questions.

At first, I checked by comparing if the length of each POST item was >1 
and then looping through each element and pushing to a new array : if(count(arr)>1){...}
  this fails when a user only selects one choice for a checkbox question: 
  count(arr)>1 will be false and attempt to add an array to the DB
  
  I noticed this was happening and changed the code in the else statement :  else{...}    //if(not >1)
  so it would add choice[0] as a quick fix which turned out to be a bust.

The most interesting part of this project:
	The tally of answers for males (which accumulated during testing) strongly reflects my own, sincere answers. I wonder if this type of interaction could be used to ask myself questions	that I couldn't normally answer consiously. 
	Being forced to answer these questions by seemingly answering with random choices, ended up showing the most popular answers as the ones I would choose if I were actually taking this survey.
	For example, I think I like oranges more, but apples that I actually enjoy more are scarce. What if I enjoy those rare apples more than I do a good, or even the best orange, only I don't realize it since I'm usually disappointed by the apples I end up eating? Basically - am I
