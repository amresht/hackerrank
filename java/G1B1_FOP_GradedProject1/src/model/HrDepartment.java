/**
 * @class           HR Department's  Class 
 * @author          Amresh Tripathi, Nayan K, Ajinkya Umathe, Kaushik Ruppara, Mayank Singh, Raj A Das 
 * @date            16-Mar-2023
 * @version         1.0
 */

package model;

public class HrDepartment extends SuperDepartment{
	public  String departmentName() {
		return "Hr Department";
	}
	
	public  String getTodaysWork() {
		return "Fill today’s timesheet and mark your attendance";
		
	}
	public String getWorkDeadline() {
		return "Complete by EOD";
	}
	
	public String doActivity() {
		return "Team lunch";
	}	

}
