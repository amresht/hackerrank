/*
 * @author      Amresh
 * @TITLE       FIND AN ARRAY's Largest and Second Largest Integars
*/
import java.io.*;

public class LargestInteger {

    static int getLargest(int arr[]) {
        int n = arr.length;
        for (int i=0; i < n ;i++){
            boolean flag = true;
            for (int j=i; j<n; j++) {
                if( arr[j] > arr[i]) {
                    flag = false;
                    break;
                }
            }
            if (flag==true)
                return i;
            }
        return -1;
    }
    
    static int SecondLargest (int arr[]) {
        int n = arr.length; 
        int largest = 0;
        int result  = -1;

    }



    public static void main(String args[]) throws IOException {
        int arr[] = {3, 2, 11, 34, 98, 13, 10, 123};
        System.out.print("Index of Largest number is=> ");
        System.out.println(getLargest(arr));

    }
}
