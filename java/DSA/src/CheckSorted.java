/*
 * @author      Amresh
 * @TITLE       FIND WHETHER A GIVEN ARRAY IS SORTED
*/
import java.io.*;

public class CheckSorted {

static boolean isSorted(int arr[]) {
    int n = arr.length;
    for (int i =0; i<n ; i++) {
        if(arr[i+1] < arr[i]) {
            return false;
        }
    }
    return true;
}

    public static void main(String args[]) throws IOException {
        int arr[] = {1, 2, 11, 34, 98, 113, 10, 1123};
        System.out.println(isSorted(arr));
    }   
}
