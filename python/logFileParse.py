import os, datetime, time
from signal import SIGTERM
import smtplib
import re

#MAX_FILE_SIZE
max_file_size = 10 * 124 * 1024 *1024 

#Regex for error
error_string  = "Error"
# Regex used to match relevant loglines (in this case, a specific string)
line_regex = re.compile(error_string, re.IGNORECASE)


# Input file, from where the matched loglines will be copied 
input_filename  = 'G:\\test\\www_log.log'
backup_filename = 'G:\\test\\www_log_'

# Output file, where the matched loglines will be copied to
output_filename = os.path.normpath("output/parsed_lines.log")

#global variable for error count 
error_count =  0;
#global variable for error text 
error_text =  [];

# create object of gracefulstop class 
runner = GracefulStop()
while not killer.kill_now:
#Run infinitely
    if file_size_check(file_path):
        with open(input_filename, "r") as in_file:
            # Loop over each log line
            for line in in_file:
                # If log line matches our regex, print to console, and output file
                if (line_regex.search(line)):
                    error_count = error_count+1
                    error_text.append(line) 
    else:
        #take a backup and mak a new file 
         rename_file(input_filename, backup_filename)
         print ("File size crossed max threshold, renamed to" + backup_filename)
         # open the log file in write mode
         open(input_filename, "w")
         

    


class GracefulStop:
    kill_now = False
    def __init__(self):
        signal.signal(signal.SIGINT, self.exit_gracefully)
        signal.signal(signal.SIGTERM, self.exit_gracefully)
    # in case you get SIGTERM exit
    def exit_gracefully(self,signum, frame):
        # create backup of the logFile and exit
        rename_file(input_filename, backup_filename)
        self.kill_now = True


"""
######################## METHODS DEFINITIONS ########################
"""
# this method will archive the current file
def rename_file(old_filename, new_filename):
    x = datetime.datetime.now()
    #print(x.strftime("%Y%m%d%H%M%S"))
    os.rename(old_filename, new_filename+x.strftime("%Y%m%d%H%M%S"))       #add datetime for log rotation
    

#this function will return the file size and compare with max defined at global max defined
def file_size_check(file_path):
    if os.path.isfile(file_path):
        file_info = os.stat(file_path)
        # return if it is in valid size  
        return (file_info.st_size < max_file_size)
        
        
def send_email(msg):
    from_email          = "noreply@noreply.com"     #   the sender's email address
    to_email            = "somebody@gmail.com"     #   the recipient's email address
    msg['Subject']      = 'log errors"
    msg['From']         = from_email
    msg['To']           = to_email

    # Send the message via our own SMTP server, 
    s = smtplib.SMTP('localhost')           #TODO PLEASE ADD YOUR OWN SMPT HERE
    s.sendmail(from_email, [to_email], msg.as_string())
    s.quit()

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