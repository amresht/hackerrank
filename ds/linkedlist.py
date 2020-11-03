# LINKED list in python
# @AUTHOR - AMRESH TRIPATHI


class Node:
    
    def __init__(self, data, next = None):
        self.data = data
        self.next =  next    # link to next node

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
    
    # INSERT A NODE A BEGINNING OF LINKED LIST
    # time complexity is O(1) as there is a fixed number of steps - ONE
    def newHeadNode(self, data):
        # create a new node with data
        new_head = Node(data)
        # set this as the head of linked list
        new_head.next = self.head
        #assign this NEW NODE at the head of the linked list
        self.head = new_head
        return
    

    # INSERT NODE AT END OF LINKED LIST
    def appendNode(self, data):
        # create a new node with data
        new_node = Node(data)
        
        if self.head is None:
                return new_node
        
        # set this as the head of linked list
        last =  self.head 
        #loop till the end of the list is found
        while(last.next):
            last= last.next
        
        last.next = new_node
        
        return

    def deleteNode(self):
        pass
    # insert a node at a position in linked list
                        
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
    #insert 2nd node
    second = Node(2) 
    llist.head.next = second
    # Insert 3rd node
    third = Node(3) 
    second.next = third
    
    llist.printList()
    print(llist)

 