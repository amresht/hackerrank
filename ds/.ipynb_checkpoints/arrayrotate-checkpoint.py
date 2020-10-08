{
 "cells": [
  {
   "cell_type": "code",
   "execution_count": 26,
   "metadata": {},
   "outputs": [
    {
     "name": "stdout",
     "output_type": "stream",
     "text": [
      "5 4 \n",
      "1 2 3 4 5\n",
      "lenth 5\n",
      "d is 4\n",
      "4\n",
      "5\n",
      "[4, 5, 1, 2, 3]\n"
     ]
    }
   ],
   "source": [
    "#!/bin/python3\n",
    "\n",
    "import math\n",
    "import os\n",
    "import random\n",
    "import re\n",
    "import sys\n",
    "\n",
    "#\n",
    "# Complete the 'rotateLeft' function below.\n",
    "#\n",
    "# The function is expected to return an INTEGER_ARRAY.\n",
    "# The function accepts following parameters:\n",
    "#  1. INTEGER d\n",
    "#  2. INTEGER_ARRAY arr\n",
    "#\n",
    "\n",
    "def rotateLeft(d, arr):\n",
    "    # Write your code here\n",
    "    length = len(arr)\n",
    "    arrnew = list()\n",
    "    \n",
    "    for i in range (d, length):\n",
    "        print(arr[i])\n",
    "        arrnew.append( arr[i])\n",
    "    \n",
    "    for i in range(length-len(arrnew)):\n",
    "        arrnew.append( arr[i])\n",
    "    \n",
    "    return arrnew\n",
    "\n",
    "if __name__ == '__main__':\n",
    "    fptr = open(os.environ['OUTPUT_PATH'], 'w')\n",
    "\n",
    "    first_multiple_input = input().rstrip().split()\n",
    "\n",
    "    n = int(first_multiple_input[0])\n",
    "\n",
    "    d = int(first_multiple_input[1])\n",
    "\n",
    "    arr = list(map(int, input().rstrip().split()))\n",
    "\n",
    "    result = rotateLeft(d, arr)\n",
    "\n",
    "    fptr.write(' '.join(map(str, result)))\n",
    "    fptr.write('\\n')\n",
    "\n",
    "    fptr.close()\n"
   ]
  },
  {
   "cell_type": "code",
   "execution_count": 11,
   "metadata": {},
   "outputs": [
    {
     "ename": "SyntaxError",
     "evalue": "invalid syntax (<ipython-input-11-1e562ff1092b>, line 1)",
     "output_type": "error",
     "traceback": [
      "\u001b[1;36m  File \u001b[1;32m\"<ipython-input-11-1e562ff1092b>\"\u001b[1;36m, line \u001b[1;32m1\u001b[0m\n\u001b[1;33m    5 4\u001b[0m\n\u001b[1;37m      ^\u001b[0m\n\u001b[1;31mSyntaxError\u001b[0m\u001b[1;31m:\u001b[0m invalid syntax\n"
     ]
    }
   ],
   "source": []
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
