/**
 * @class           Admin Department Class 
 * @author          Amresh Tripathi, Nayan K, Ajinkya Umathe, Kaushik Ruppara, Mayank Singh, Raj A Das
 * @date            16-Mar-2023
 * @version         1.0
 */

package model;

public class AdminDepartment extends SuperDepartment{

	
	public  String departmentName() {
		return "Admin Department";
	}
	
	public  String getTodaysWork() {
		return "Complete your documents Submission";
		
	}
	public  String getWorkDeadline() {
		return "Complete by EOD";
	}
	

}
