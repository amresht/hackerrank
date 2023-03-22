/**
 * @class           Bubble Sort Driver App Class 
 * @author          Amresh Tripathi 
 * @date            20-Mar-2023
 * @version         1.0
 */
package app;

import lib.BubbleSort;

public class BubbleSortDriver {

	public static void main(String args[]) {
		// TODO Auto-generated constructor stub
		BubbleSort 	bs = new BubbleSort();
	    int arr[] = {2, 1, 4, 3, 11, 19, 9, 22, 16, 88};
	    int len  = arr.length;
	    bs.BubbleSorting(arr, len);
	    
	    for(int i = 0; i < arr.length; i++) {
	        System.out.print(arr[i] + " ");
	    }
	}
}

	