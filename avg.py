#!/home/amresh/anaconda3/bin/python


n = int(input())
student_marks = {}
for _ in range(n):
    name, *line = input().split()
    scores = list(map(float, line))
    student_marks[name] = scores
query_name = input()
#print(student_marks[query_name])
ctr=len(student_marks[query_name])
#print(ctr)

summ= sum(student_marks[query_name])
print ("%.2f" % (summ/ctr))
print ("%.2f" % (summ/ctr))





