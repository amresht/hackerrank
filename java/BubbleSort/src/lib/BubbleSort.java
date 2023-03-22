/**
 * @class          BubbleSort Class 
 * @author          Amresh Tripathi 
 * @date            20-Mar-2023
 * @version         1.0
 */

package lib;

public class BubbleSort {

	public BubbleSort() {
		// TODO Auto-generated constructor stub
		
	}
	
	public void BubbleSorting(int arr[], int n) {
		// for all the elements in array
		for (int i=0; i< n; i++) {
			// from 
			for (int j= 0; j < n-i-1 ; j++) {
				if (arr[j] > arr[j+1]) {
					// swap the values
					int temp  = arr[j];
					arr[j]  = arr[j+1];
					arr[j+1] = temp;
				}
			}
		} //end for
	} // end method
	
	
	public void BubbleSortOptimized(int arr[], int n) {
		for (int i=0; i< n; i++) {
			boolean swapped = false;
			// from 
			for (int j= 0; j < n-i-1 ; j++) {
				
				if (arr[j] > arr[j+1]) {
					// swap the values
					int temp  = arr[j];
					arr[j]  = arr[j+1];
					arr[j+1] = temp;
				}
			}
			
			if (swapped ==false)
				break;
	
		} //end for
	} // end method
		
}
