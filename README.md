#P2: configurable dictionary based xkcd password generator, Joachim Byrnes-Shay
# 9/22/2016

## Live URL
<http://p2.midnightoil.me>

## Description
This is a user configurable xkcd style password generator.
The word list is based on a word list (text file) of 109582 English words.

## Credits
The word file, wordsEn.txt, is from www-01.sil.org/linguistics/wordlists/english.  
All programming and styling by myself, Joachim Byrnes-Shay.

## Screencast Demo
http://screencast.com/t/GKvwovIaaBV

## Usage Details 
User is presented the ability to configure max word length, how many words, option for 
including a number (added to last word), or a symbol (added to first word).  There is
also an advanced configuration option for setting case options.  The default case for
all generated passwords is lowercase.  When checking the "configure case" option, 
user will be presented the alternatives of 1.  setting all words to uppercase, 2. capitalizing
only the first letter of each word, or 3. alternate case, where the first word and all 
odd words will be in uppercase and every second word will be lower case.  The advanced 
config is hidden and shown using javascript script which has been placed in a separate file.

## Outside code
No outside code was used for this project
