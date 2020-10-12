# LINKED list in python
# @AUTHOR - AMRESH TRIPATHI


class Node:
    
    def __init__(self, data):
        self.data = data

        self.next =  None    # link to next node

class LinkedList:
    # initialize with no values 
    def __init__(self, head=None):
        self.head = head
    
    #convert list to  a string 
    def __str__(self): 
        # defining a blank res variable 
        res = \"\" 

        # initializing ptr to head 
        ptr = self.head 

       # traversing and adding it to res 
        while ptr: 
            res += str(ptr.data) + \", \"
            ptr = ptr.next

       # removing trailing commas 
        res = res.strip(\", \") 

        # chen checking if  
        # anything is present in res or not 
        if len(res): 
            return \"[\" + res + \"]\"
        else: 
            return \"[]\"    
        
    def appendNode(self):
        pass
    def deleteNode(self):
        pass
    def insertNode(self):
        pass
    def reverseList(self):
        pass
    
    # This function prints contents of linked list 
    # starting from head 
    def printList(self): 
        temp = self.head 
        while (temp): 
            print (temp.data) 
            temp = temp.next

Code execution starts here 
if __name__=='__main__': 
  
    # Start with the empty list 
    llist = LinkedList() 
    # Create the head node of the list
    llist.head = Node(1) 
    second = Node(2) 
    third = Node(3) 
    
    llist.head.next = second
    
    second.next = third
    
    llist.printList()
    print(llist)

 