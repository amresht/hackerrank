#!/home/amresh/anaconda3/bin/python

N = int(input())
arr = list()

for _ in range(N):
    myline = input().split(" ")
    
    if (myline[0] == "print"):
        cmd="print(arr)" 
    else:
        cmd = "arr." + myline.pop(0)
        sepa = ","
        args = sepa.join(myline)
        cmd +=  "(" + args + ")"
    #print(cmd)
    eval (cmd) 
  