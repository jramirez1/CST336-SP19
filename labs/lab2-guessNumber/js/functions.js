
            
            var gamesWon = 0;
            var gamesLost = 0;
            var randomNumber = Math.floor(Math.random()*99) + 1;
            var guesses = document.querySelector("#guesses");
            var lastResult = document.querySelector("#lastResult");
            var lowOrHi = document.querySelector("#lowOrHi");
            var games = document.querySelector(("#games"));
            
            var guessSubmit = document.querySelector(".guessSubmit");
            var guessField = document.querySelector(".guessField");
            
            var guessCount = 1;
            var resetButton = document.querySelector("#reset");
            resetButton.style.display = 'none';







            function checkGuess()
            {
                var userGuess = Number(guessField.value);
                
                if(guessCount ===1)
                {
                    guesses.innerHTML = "Previous guesses: ";
                }
                guesses.innerHTML += userGuess + ' ';
                
                if(userGuess === randomNumber)
                {
                    lastResult.innerHTML = "Congratulations! You got it right!";
                    lastResult.style.backgroundColor = 'green';
                    lowOrHi.innerHTML = ' ';
                    gamesWon++;
                    setGameOver();
                }
                else if(guessCount === 7)
                {
                    lastResult.innerHTML = "Sorry, you lost!";
                    gamesLost++;
                    setGameOver();
                }
                else 
                {
                    if(userGuess > 99 || userGuess < 1)
                    {
                        lastResult.innerHTML = "Number not allowed!";
                        lastResult.style.backgroundColor = 'yellow';
                    }
                    else
                    {
                        
                        lastResult.innerHTML = "Wrong!";
                        lastResult.style.backgroundColor = 'red';
                        if(userGuess < randomNumber)
                        {
                            lowOrHi.innerHTML = "Last guess was too low!";
                        }
                        else if(userGuess > randomNumber)
                        {
                            lowOrHi.innerHTML = "Last guess was too high!";
                        }
                        guessCount++;
                        guessField.value = '';
                        guessField.focus();
                    }
                }
                
           
            }
            $(guessSubmit).click(function() {
              checkGuess()
            });
            //guessSubmit.addEventListener("click",checkGuess);
            
            
            
            
            
        
            function setGameOver()
            {
                guessField.disabled = true;
                guessSubmit.disabled = true;
                //resetButton.style.display = 'inline';
                $(resetButton).css("display", "inline");
                games.innerHTML = "Games Lost = " +gamesLost + "  Games Won = " +gamesWon;
                resetButton.addEventListener('click',resetGame);
            }
            
            
            
                
    

            
            
            
            
            
            function resetGame()
            {
                guessCount = 1;
                var resetParas = document.querySelectorAll('.resultParas p');
                for(var i = 0; i < resetParas.length ; i++)
                {
                    resetParas[i].textContent = '';
                }
                
               // resetButton.style.display = 'none';
                $(resetButton).css("display", 'none');
                guessField.disabled = false;
                guessSubmit.disabled = false;
                guessField.value = '';
                guessField.focus();
                
                //lastResult.style.backgroundColor = 'white';
                $(lastResult).css('backgroundColor','white');
                randomNumber = Math.floor(Math.random()*99)+1;
                $(games).hide();//jquery
            }
            
        