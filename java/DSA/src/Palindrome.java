/*
 * @desc		A recursive method to check for Palindrome, accepts argument at command prompt
 * @author		Amresh Tripathi
 * @date		16-Jan-2023
 * */

public class Palindrome {

	public static boolean isPalindrome(String str, int start , int end) {

		if (start >= end) {
			return true;
		}
		
		return( (str.charAt(start)== str.charAt(end))   &&   isPalindrome(str, start +1, end-1)  );
		
	}
	
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		String str = args[0];
		int start = 0;
		int end = str.length() -1;	// last element is length -1
		System.out.println(isPalindrome(str, start, end));
	} // END MAIN

}
