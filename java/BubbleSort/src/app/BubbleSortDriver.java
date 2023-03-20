/**
 * @class           Bubble Sort Driver App Class 
 * @author          Amresh Tripathi, Nayan K, Ajinkya Umathe, Kaushik Ruppara, Mayank Singh, Raj A Das, 
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
	    bs.BubbleSorting(arr, 10);
	    
	    for(int i = 0; i < arr.length; i++) {
	        System.out.print(arr[i] + " ");
	    }
	}
}

	