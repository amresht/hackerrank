/**
 * @class           Tech department  Class 
 * @author          Amresh Tripathi
 * @date            16-Mar-2023
 * @version         1.0
 */

package model;

public class TechDepartment extends SuperDepartment {
	public String departmentName() {
		return "Tech Department";
	}
	
	public String getTodaysWork() {
		return "Complete coding of module 1";
		
	}
	public String getWorkDeadline() {
		return "Complete by EOD";
	}
	
	public String getTechStackInformation() {
		return "core Java";
	}
}

