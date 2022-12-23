/*
 * @author      Amresh
 * @TITLE       FIND WHETHER A GIVEN STRING IS A PALINDROME OR NOT
*/
class MyPalindrome {


	public static void main (String[] args) {
        
        String sport ;
        
        try {
            // let us read the string from command line
            sport = new String(args[0]);
            System.out.println(isPal(sport));
        }
        catch (ArrayIndexOutOfBoundsException e ){
            System.out.println("Bad string.");
        }
    
}

    /*
     * isPal accepts a string as 
     */
    static boolean isPal (String str) {
        
        int begin = 0;
        int end = str.length() - 1;

        while (begin < end) {
            if( str.charAt(begin) != str.charAt(end) )
                return false;
            begin++;
            end--;
        }
        return true;
    }
}