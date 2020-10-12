{
 "cells": [
  {
   "cell_type": "code",
   "execution_count": 3,
   "metadata": {},
   "outputs": [
    {
     "name": "stdout",
     "output_type": "stream",
     "text": [
      "1\n",
      "2\n",
      "3\n"
     ]
    }
   ],
   "source": [
    "\n",
    "# lINKED list in python\n",
    "# @AUTHOR - AMRESH TRIPATHI\n",
    "#\n",
    "\n",
    "class Node:\n",
    "    \n",
    "    def __init__(self, data):\n",
    "        self.data = data\n",
    "\n",
    "        self.next =  None    # link to next node\n",
    "\n",
    "class LinkedList:\n",
    "    # initialize with no values \n",
    "    def __init__(self, head=None):\n",
    "        self.head = head\n",
    "        \n",
    "        \n",
    "    def appendNode(self):\n",
    "        pass\n",
    "    def deleteNode(self):\n",
    "        pass\n",
    "    def insertNode(self):\n",
    "        pass\n",
    "    def reverseList(self):\n",
    "        pass\n",
    "    \n",
    "    # This function prints contents of linked list \n",
    "    # starting from head \n",
    "    def printList(self): \n",
    "        temp = self.head \n",
    "        while (temp): \n",
    "            print (temp.data) \n",
    "            temp = temp.next\n",
    "\n",
    "# Code execution starts here \n",
    "if __name__=='__main__': \n",
    "  \n",
    "    # Start with the empty list \n",
    "    llist = LinkedList() \n",
    "    # Create the head node of the list\n",
    "    llist.head = Node(1) \n",
    "    second = Node(2) \n",
    "    third = Node(3) \n",
    "    \n",
    "    llist.head.next = second\n",
    "    \n",
    "    second.next = third\n",
    "    \n",
    "    llist.printList()\n",
    "    "
   ]
  },
  {
   "cell_type": "code",
   "execution_count": null,
   "metadata": {},
   "outputs": [],
   "source": []
  }
 ],
 "metadata": {
  "kernelspec": {
   "display_name": "Python 3",
   "language": "python",
   "name": "python3"
  },
  "language_info": {
   "codemirror_mode": {
    "name": "ipython",
    "version": 3
   },
   "file_extension": ".py",
   "mimetype": "text/x-python",
   "name": "python",
   "nbconvert_exporter": "python",
   "pygments_lexer": "ipython3",
   "version": "3.8.3"
  }
 },
 "nbformat": 4,
 "nbformat_minor": 4
}
