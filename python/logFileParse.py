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
#global variable for error text 
error_text =  [];

#Run infinitely
while True:

    with open(input_filename, "r") as in_file:
        # Loop over each log line
        for line in in_file:
            # If log line matches our regex, print to console, and output file
            if (line_regex.search(line)):
                error_count = error_count+1
                List.append(line) 
                out_file.write(line)

# this method will rename the file name to a backup path
def rename_file(old_filename, new_filename):
    os.rename(r'old_filename',r'old_filename')

def send_email(body):
    pass
"""
//pseudo code
    
    
while true
    check file size
    if file_size > 10 GB 
        rename current file as bkp 
        create new blank file
        
    if SIGNTERM 
        rename current file as bkp 
        exit script
    
    
    check file size
    if file_size > 10 GB 
        rename current file as bkp 
        create new blank file

    
    read file line by line
    
    // if the log file matches and time is within 8:00 18:00
    write to output log
        error_list.append (error_instance)

    
    if time%% 60s 
        send email 
        empty  error_list
"""