
## Usage Guide

1. Clone project: https://github.com/obinnajohnphill/obinna-project-1.git

2. Run parser.php --file=products_comma_separated.csv --unique-combinations={filename}

(i.e --unique-combinations=combination_count.csv)

3. Wait for script to complete the listing of all the products on terminal, until you see below command

--------------------------------------
Enter: Ctrl+C (to complete the process)

4. Interrupt (kill) the current foreground process running on the terminal

5. Open the file which you'd set on {--unique-combinations} parameter, it is now located at the project root directory

6. The file should now contain the products grouped count, for each unique combination


## Example of Script Command

php parser.php  --file=products_comma_separated.csv --unique-combinations=combination_count.csv


