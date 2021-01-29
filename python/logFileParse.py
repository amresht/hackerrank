import sys, os, time, atexit
from signal import SIGTERM

import os
import re

#Regex for error
error_string  = "Error"
# Regex used to match relevant loglines (in this case, a specific string)
line_regex = re.compile(error_string, re.IGNORECASE)


# Input file, from where the matched loglines will be copied 
input_filename ="test_log.log"

# Output file, where the matched loglines will be copied to
output_filename = os.path.normpath("output/parsed_lines.log")

#global variable for error count 
error_count =  0;


# Overwrites the file, ensure we're starting out with a blank file
with open(output_filename, "w") as out_file:
    out_file.write("")

# Open output file in 'append' mode
with open(output_filename, "a") as out_file:
    # Open input file in 'read' mode
    with open(input_filename, "r") as in_file:
        # Loop over each log line
        for line in in_file:
            # If log line matches our regex, print to console, and output file
            if (line_regex.search(line)):
                error_count = error_count+1
                print line
                out_file.write(line)

# this method will rename the file name to a backup path
def rename_file(old_filename, new_filename):
    os.rename(r'old_filename',r'old_filename')

       
    