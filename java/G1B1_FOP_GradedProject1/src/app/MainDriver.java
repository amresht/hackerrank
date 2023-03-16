/**
 * @class           Driver App Class 
 * @author          Amresh Tripathi
 * @date            16-Mar-2023
 * @version         1.0
 */

package app;
import model.*;

public class MainDriver {

	public static void main(String args[]) {
		
		// Call the ADMIN Department methods by creating an object
		AdminDepartment adm =  new AdminDepartment();
		
		System.out.println("Welcome to " + adm.departmentName());
		System.out.println(adm.getTodaysWork());
		System.out.println(adm.getWorkDeadline());
		System.out.println(adm.isTodayAHoliday());		// this is method from Super Deptt class
		System.out.println();
		
		//Call the HR Department methods by creating an object
		HrDepartment hr = new HrDepartment();
		System.out.println("Welcome to " + hr.departmentName());
		System.out.println(hr.doActivity());
		System.out.println(hr.getTodaysWork());
		System.out.println(hr.getWorkDeadline());
		System.out.println(hr.isTodayAHoliday());		// this is method from Super Deptt class
		System.out.println();
		
		//Call the Tech Department methods by creating an object
		TechDepartment tech = new TechDepartment();
		System.out.println("Welcome to " + tech.departmentName());
		System.out.println(tech.getTodaysWork());
		System.out.println(tech.getWorkDeadline());
		System.out.println(tech.getTechStackInformation());
		System.out.println(tech.isTodayAHoliday());		// this is method from Super Deptt class
		
		
	}

}
