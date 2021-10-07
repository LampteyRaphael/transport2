<?php 
namespace console\controllers; 
 
use Yii;
use yii\console\Controller;
 
class RbacController extends Controller 
{     
	public function actionInit()     
	{         
		$auth = Yii::$app->authManager;
	//	$auth->removeAll(); //remove previous rbac.php files under console/data
 
	    //CREATE PERMISSIONS	
 
	    /*************** Assets Permission *************/	
 
		//Permission to create assets
		$createAsset = $auth->createPermission('createAsset');
        $createAsset->description = 'Create Asset';
        $auth->add($createAsset);
 
		//Permission to edit assets
		$editAsset = $auth->createPermission('editAsset');
        $editAsset->description = 'Edit Asset';
        $auth->add($editAsset);
 
        //Permission to view asset
        $viewAsset = $auth->createPermission('viewAsset');
        $viewAsset->description = 'View Asset';
        $auth->add($viewAsset);
 
        //Permission to view asset
        $deleteAsset = $auth->createPermission('deleteAsset');
        $deleteAsset->description = 'Delete Asset';
        $auth->add($deleteAsset);
 
 
	 	/************** End of Assets Permission ******/
 
 
	 	 /*************** Residents Permission *************/	
        //Permission to create residents
        $createResident = $auth->createPermission('createResident');
        $createResident->description = 'Create Resident';
        $auth->add($createResident);
 
        //Permission to edit resident
        $editResident = $auth->createPermission('editResident');
        $editResident->description = 'Edit Resident';
        $auth->add($editResident);
 
        //Permission to view resident
        $viewResident = $auth->createPermission('viewResident');
        $viewResident->description = 'View Resident';
        $auth->add($viewResident);
 
        //Permission to delete resident
        $deleteResident = $auth->createPermission('deleteResident');
        $deleteResident->description = 'Delete Asset';
        $auth->add($deleteResident);
 
        /************** End of Residents Permission ******/
 
        /*************** Report Permissions **************/
        //Permission to create report
        $createReport = $auth->createPermission('createReport');
        $createReport->description = 'Create Report';
        $auth->add($createReport);
 
        //Permission to view report
        $viewReport = $auth->createPermission('viewReport');
        $viewReport->description = 'Edit Report';
        $auth->add($viewReport);
 
        /*************** End of Report Permissions **************/
 
        /*************** Payment Permissions **************/
        //Permission to make Payment
        $makePayment = $auth->createPermission('makePayment');
        $makePayment->description = 'Make Payment';
        $auth->add($makePayment);
 
        //Permission to view Payment
        $viewPayment = $auth->createPermission('viewPayment');
        $viewPayment->description = 'View Payment';
        $auth->add($viewPayment);
 
        /*************** End of Payment Permissions **************/
 
        //Permission to view all dasboard
        $viewDashboards = $auth->createPermission('viewDashboards');
        $viewDashboards->description = 'View Dashboards';
        $auth->add($viewDashboards);
 
        //Permission to create user profiles such as board, executive, and admin
        $createUserProfile = $auth->createPermission('createProfile');
        $createUserProfile->description = 'Create User Profile';
        $auth->add($createUserProfile);
 
        $viewUserProfile = $auth->createPermission('viewProfile');
        $viewUserProfile->description = 'View User Profile';
        $auth->add($viewUserProfile);
 
 
        //ROLES
        $dataEntry = $auth->createRole('dataEntry');  //Data Entry role
        $auth->add($dataEntry);
        $auth->addChild($dataEntry, $createAsset);
        $auth->addChild($dataEntry, $editAsset);
        $auth->addChild($dataEntry, $createResident);
        $auth->addChild($dataEntry, $editResident);
 
 
        $resident = $auth->createRole('resident'); // Resident role
        $auth->add($resident);
        $auth->addChild($resident, $makePayment);
        $auth->addChild($resident, $viewPayment);
 
 
        $boardOfInland = $auth->createRole('board'); // Board of Inland Revenue role
        $auth->add($boardOfInland);
        $auth->addChild($boardOfInland, $dataEntry);
        $auth->addChild($boardOfInland, $resident);
        $auth->addChild($boardOfInland, $viewAsset);
        $auth->addChild($boardOfInland, $deleteAsset);
        $auth->addChild($boardOfInland, $deleteResident);
        $auth->addChild($boardOfInland, $createReport);
        $auth->addChild($boardOfInland, $viewReport);
 
        $executiveMgmt = $auth->createRole('executive'); // Executive Management role
        $auth->add($executiveMgmt);
		$auth->addChild($executiveMgmt, $boardOfInland);
		$auth->addChild($executiveMgmt, $viewDashboards);
 
		$admin = $auth->createRole('admin');
		$auth->add($admin);
		$auth->addChild($admin, $executiveMgmt);
        $auth->addChild($admin, $viewUserProfile);
		$auth->addChild($admin, $createUserProfile);
 
 
		$auth->assign($admin, 1);
 
    }
}