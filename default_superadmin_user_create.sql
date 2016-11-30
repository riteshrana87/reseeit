INSERT INTO `blzdsk_role_master` (`role_id`, `role_name`, `created_date`, `status`, `is_delete`) VALUES
(39, 'SuperAdmin', '2016-02-02 12:59:21', 1, 0);

INSERT INTO `blzdsk_login` (`login_id`, `salution_prefix`, `firstname`, `lastname`, `email`, `password`, `address`, `address_1`, `city`, `state`, `pincode`, `country`, `telephone1`, `telephone2`, `profile_photo`, `user_type`, `dashboard_widgets`, `dashboard_pm_widgets`, `blazedesk_pm_taskdashboardWidgets`, `taskdashboardinnerWidgets`, `created_date`, `modified_date`, `session_id`, `parent_id`, `status`, `reset_password_token`, `is_delete`) VALUES
(27, 0, 'Hardik', 'Dwivedi', 'hardik.dwivedi@c-metric.com', 'f4df3741b5b4e0cf34ac90a75b9152e7', 'Ahmedabad', '', '', '', '', 0, '7894561230', '', '', 39, '{"sectionRight":["position-right-top","position-left-top","position-right-bottom"],"sectionLeft":["position-left-bottom"]}', '', '', '', '2016-02-05 11:34:25', '2016-02-25 11:40:48', '', 0, 1, '', 0);


INSERT INTO `blzdsk_aauth_perms` (`id`, `name`, `defination`) VALUES
(1, 'view', 'User Can Access View feature.!!'),
(2, 'add', 'User Can Access add feature.!!'),
(3, 'edit', 'User Can Access Edit feature.!!'),
(4, 'delete', 'User Can Access Delete feature.!!');

INSERT INTO `blzdsk_module_master` (`module_id`, `component_name`, `module_name`, `module_unique_name`, `controller_name`, `created_date`, `status`) VALUES
(7, 'User', 'User', 'User', 'User', '0000-00-00 00:00:00', 1),
(8, 'CRM', 'Opportunity', 'Opportunity', 'Opportunity', '2016-02-02 12:44:15', 1),
(9, 'CRM', 'Prospect', 'Prospect', 'Prospect', '2016-02-02 12:45:23', 1),
(11, 'CRM', 'Lead', 'Lead', 'Lead', '2016-02-02 12:49:39', 1),
(12, 'CRM', 'Client', 'Client', 'Client', '2016-02-02 12:49:53', 1),
(13, 'CRM', 'Task', 'Task', 'Task', '2016-02-02 12:50:06', 1),
(14, 'CRM', 'Campaigngroup', 'Campaigngroup', 'Campaigngroup', '2016-02-02 12:53:07', 1),
(15, 'CRM', 'Contact', 'Contact', 'Contact', '2016-02-02 12:54:00', 1),
(16, 'PM', 'Costs', 'Costs', 'Costs', '2016-02-02 12:54:57', 1),
(17, 'settings', 'Rolemaster', 'Rolemaster', 'Rolemaster', '2016-02-02 12:55:15', 1),
(18, 'CRM', 'RequestBudget', 'RequestBudget', 'RequestBudget', '2016-02-02 12:55:29', 1),
(19, 'CRM', 'CampaignReport', 'CampaignReport', 'CampaignReport', '2016-02-02 12:56:45', 1),
(20, 'CRM', 'SalesCampaign', 'SalesCampaign', 'SalesCampaign', '2016-02-04 05:38:31', 1),
(21, 'CRM', 'Estimates', 'Estimates', 'Estimates', '2016-02-04 05:40:22', 1),
(23, 'CRM', 'Dashboard', 'Dashboard', 'Dashboard', '2016-02-04 05:44:48', 1),
(24, 'PM', 'Home', 'Home', 'Home', '2016-02-04 05:45:20', 1),
(25, 'PM', 'Milestone', 'Milestone', 'Milestone', '2016-02-04 06:30:46', 1),
(26, 'PM', 'Projectmanagement', 'Projectmanagement', 'Projectmanagement', '2016-02-04 06:30:56', 1),
(27, 'PM', 'ProjectTask', 'ProjectTask', 'ProjectTask', '2016-02-04 06:31:04', 1),
(28, 'PM', 'Filemanager', 'Filemanager', 'Filemanager', '2016-02-04 06:31:18', 1),
(33, 'CRM', 'SalesOverview', 'SalesOverview', 'SalesOverview', '2016-02-09 12:34:52', 1),
(34, 'CRM', 'Emailtemplate', 'Emailtemplate', 'Emailtemplate', '2016-02-09 15:00:23', 1),
(35, 'CRM', 'Product', 'Product', 'Product', '2016-02-12 05:54:05', 1),
(36, 'PM', 'Activities', 'Activities', 'Activities', '2016-02-16 12:37:18', 1),
(38, 'CRM', 'ProductGroup', 'ProductGroup', 'ProductGroup', '2016-02-17 11:49:27', 1),
(39, 'PM', 'Timesheets', 'Timesheets', 'Timesheets', '2016-02-17 12:31:51', 1),
(40, 'settings', 'Currencysettings', 'Currencysettings', 'Currencysettings', '2016-02-18 11:51:11', 1),
(41, 'PM', 'Messages', 'Messages', 'Messages', '2016-02-19 08:47:16', 1),
(42, 'CRM', 'MyProfile', 'MyProfile', 'MyProfile', '2016-02-19 09:50:41', 1),
(43, 'CRM', 'Marketingcampaign', 'Marketingcampaign', 'Marketingcampaign', '2016-02-19 10:13:14', 1),
(44, 'CRM', 'ManageCampaigns', 'ManageCampaigns', 'ManageCampaigns', '2016-02-19 10:13:43', 1),
(45, 'CRM', 'Account', 'Account', 'Account', '2016-02-22 04:24:57', 1),
(46, 'PM', 'Projectdashboard', 'Projectdashboard', 'Projectdashboard', '2016-02-23 10:51:47', 1),
(47, 'CRM', 'Campaignarchive', 'Campaignarchive', 'Campaignarchive', '2016-02-24 09:43:38', 1),
(49, 'settings', 'Settings', 'Settings', 'Settings', '2016-03-01 06:41:36', 1),
(50, 'settings', 'ProjectStatus', 'ProjectStatus', 'ProjectStatus', '2016-03-01 13:08:12', 1),
(51, 'Support', 'Support', 'Support', 'Support', '2016-03-01 14:26:25', 1),
(52, 'Support', 'Ticket', 'Ticket', 'Ticket', '2016-03-01 14:27:49', 1),
(53, 'PM', 'ProjectIncidents', 'ProjectIncidents', 'ProjectIncidents', '2016-03-03 12:25:47', 1),
(54, 'PM', 'TeamMembers', 'TeamMembers', 'TeamMembers', '2016-02-08 09:03:19', 1),
(55, 'CRM', 'KnowledgeBase', 'KnowledgeBase', 'KnowledgeBase', '2016-03-04 10:04:37', 1),
(56, 'CRM', 'Company', 'Company', 'Company', '2016-03-07 14:04:55', 1),
(57, 'Support', 'SupportSettings', 'SupportSettings', 'SupportSettings', '2016-03-09 04:23:54', 1),
(58, 'Support', 'SupportTeam', 'SupportTeam', 'SupportTeam', '2016-03-09 10:22:58', 1),
(59, 'PM', 'ProjectIncidentsType', 'ProjectIncidentsType', 'ProjectIncidentsType', '2016-03-09 14:23:44', 1),
(61, 'CRM', 'EstimateSettings', 'EstimateSettings', 'EstimateSettings', '2016-03-14 10:09:30', 1),
(63, 'CRM', 'Mail', 'Mail', 'Mail', '2016-03-16 15:45:32', 1),
(64, 'Support', 'KnowledgeBaseSettings', 'KnowledgeBaseSettings', 'KnowledgeBaseSettings', '2016-03-16 17:36:24', 1),
(65, 'CRM', 'EstimatesClient', 'EstimatesClient', 'EstimatesClient', '2016-03-22 13:01:34', 1),
(66, 'PM', 'Invoices', 'Invoices', 'Invoices', '2016-03-23 10:22:09', 1),
(67, 'Support', 'SupportReport', 'SupportReport', 'SupportReport', '2016-03-30 05:49:40', 1),
(68, 'settings', 'SalesTargetSettings', 'SalesTargetSettings', 'SalesTargetSettings', '2016-04-01 13:59:49', 1);




INSERT INTO `blzdsk_aauth_perm_to_group` (`perm_id`, `role_id`, `module_id`, `component_name`) VALUES
(1, 39, 8, 'CRM'),
(2, 39, 8, 'CRM'),
(3, 39, 8, 'CRM'),
(4, 39, 8, 'CRM'),
(1, 39, 9, 'CRM'),
(2, 39, 9, 'CRM'),
(3, 39, 9, 'CRM'),
(4, 39, 9, 'CRM'),
(1, 39, 11, 'CRM'),
(2, 39, 11, 'CRM'),
(3, 39, 11, 'CRM'),
(4, 39, 11, 'CRM'),
(1, 39, 12, 'CRM'),
(2, 39, 12, 'CRM'),
(3, 39, 12, 'CRM'),
(4, 39, 12, 'CRM'),
(1, 39, 13, 'CRM'),
(2, 39, 13, 'CRM'),
(3, 39, 13, 'CRM'),
(4, 39, 13, 'CRM'),
(1, 39, 14, 'CRM'),
(2, 39, 14, 'CRM'),
(3, 39, 14, 'CRM'),
(4, 39, 14, 'CRM'),
(1, 39, 15, 'CRM'),
(2, 39, 15, 'CRM'),
(3, 39, 15, 'CRM'),
(4, 39, 15, 'CRM'),
(1, 39, 18, 'CRM'),
(2, 39, 18, 'CRM'),
(3, 39, 18, 'CRM'),
(4, 39, 18, 'CRM'),
(1, 39, 19, 'CRM'),
(2, 39, 19, 'CRM'),
(3, 39, 19, 'CRM'),
(4, 39, 19, 'CRM'),
(1, 39, 20, 'CRM'),
(2, 39, 20, 'CRM'),
(3, 39, 20, 'CRM'),
(4, 39, 20, 'CRM'),
(1, 39, 21, 'CRM'),
(2, 39, 21, 'CRM'),
(3, 39, 21, 'CRM'),
(4, 39, 21, 'CRM'),
(1, 39, 23, 'CRM'),
(2, 39, 23, 'CRM'),
(3, 39, 23, 'CRM'),
(4, 39, 23, 'CRM'),
(1, 39, 33, 'CRM'),
(2, 39, 33, 'CRM'),
(3, 39, 33, 'CRM'),
(4, 39, 33, 'CRM'),
(1, 39, 34, 'CRM'),
(2, 39, 34, 'CRM'),
(3, 39, 34, 'CRM'),
(4, 39, 34, 'CRM'),
(1, 39, 35, 'CRM'),
(2, 39, 35, 'CRM'),
(3, 39, 35, 'CRM'),
(4, 39, 35, 'CRM'),
(1, 39, 38, 'CRM'),
(2, 39, 38, 'CRM'),
(3, 39, 38, 'CRM'),
(4, 39, 38, 'CRM'),
(1, 39, 42, 'CRM'),
(2, 39, 42, 'CRM'),
(3, 39, 42, 'CRM'),
(4, 39, 42, 'CRM'),
(1, 39, 43, 'CRM'),
(2, 39, 43, 'CRM'),
(3, 39, 43, 'CRM'),
(4, 39, 43, 'CRM'),
(1, 39, 44, 'CRM'),
(2, 39, 44, 'CRM'),
(3, 39, 44, 'CRM'),
(4, 39, 44, 'CRM'),
(1, 39, 45, 'CRM'),
(2, 39, 45, 'CRM'),
(3, 39, 45, 'CRM'),
(4, 39, 45, 'CRM'),
(1, 39, 47, 'CRM'),
(2, 39, 47, 'CRM'),
(3, 39, 47, 'CRM'),
(4, 39, 47, 'CRM'),
(1, 39, 55, 'CRM'),
(2, 39, 55, 'CRM'),
(3, 39, 55, 'CRM'),
(4, 39, 55, 'CRM'),
(1, 39, 56, 'CRM'),
(2, 39, 56, 'CRM'),
(3, 39, 56, 'CRM'),
(4, 39, 56, 'CRM'),
(1, 39, 61, 'CRM'),
(2, 39, 61, 'CRM'),
(3, 39, 61, 'CRM'),
(4, 39, 61, 'CRM'),
(1, 39, 63, 'CRM'),
(2, 39, 63, 'CRM'),
(3, 39, 63, 'CRM'),
(4, 39, 63, 'CRM'),
(1, 39, 65, 'CRM'),
(2, 39, 65, 'CRM'),
(3, 39, 65, 'CRM'),
(4, 39, 65, 'CRM'),
(1, 39, 16, 'PM'),
(2, 39, 16, 'PM'),
(3, 39, 16, 'PM'),
(4, 39, 16, 'PM'),
(1, 39, 24, 'PM'),
(2, 39, 24, 'PM'),
(3, 39, 24, 'PM'),
(4, 39, 24, 'PM'),
(1, 39, 25, 'PM'),
(2, 39, 25, 'PM'),
(3, 39, 25, 'PM'),
(4, 39, 25, 'PM'),
(1, 39, 26, 'PM'),
(2, 39, 26, 'PM'),
(3, 39, 26, 'PM'),
(4, 39, 26, 'PM'),
(1, 39, 27, 'PM'),
(2, 39, 27, 'PM'),
(3, 39, 27, 'PM'),
(4, 39, 27, 'PM'),
(1, 39, 28, 'PM'),
(2, 39, 28, 'PM'),
(3, 39, 28, 'PM'),
(4, 39, 28, 'PM'),
(1, 39, 36, 'PM'),
(2, 39, 36, 'PM'),
(3, 39, 36, 'PM'),
(4, 39, 36, 'PM'),
(1, 39, 39, 'PM'),
(2, 39, 39, 'PM'),
(3, 39, 39, 'PM'),
(4, 39, 39, 'PM'),
(1, 39, 41, 'PM'),
(2, 39, 41, 'PM'),
(3, 39, 41, 'PM'),
(4, 39, 41, 'PM'),
(1, 39, 46, 'PM'),
(2, 39, 46, 'PM'),
(3, 39, 46, 'PM'),
(4, 39, 46, 'PM'),
(1, 39, 53, 'PM'),
(2, 39, 53, 'PM'),
(3, 39, 53, 'PM'),
(4, 39, 53, 'PM'),
(1, 39, 54, 'PM'),
(2, 39, 54, 'PM'),
(3, 39, 54, 'PM'),
(4, 39, 54, 'PM'),
(1, 39, 59, 'PM'),
(2, 39, 59, 'PM'),
(3, 39, 59, 'PM'),
(4, 39, 59, 'PM'),
(1, 39, 66, 'PM'),
(2, 39, 66, 'PM'),
(3, 39, 66, 'PM'),
(4, 39, 66, 'PM'),
(1, 39, 51, 'Support'),
(2, 39, 51, 'Support'),
(3, 39, 51, 'Support'),
(4, 39, 51, 'Support'),
(1, 39, 52, 'Support'),
(2, 39, 52, 'Support'),
(3, 39, 52, 'Support'),
(4, 39, 52, 'Support'),
(1, 39, 57, 'Support'),
(2, 39, 57, 'Support'),
(3, 39, 57, 'Support'),
(4, 39, 57, 'Support'),
(1, 39, 58, 'Support'),
(2, 39, 58, 'Support'),
(3, 39, 58, 'Support'),
(4, 39, 58, 'Support'),
(1, 39, 64, 'Support'),
(2, 39, 64, 'Support'),
(3, 39, 64, 'Support'),
(4, 39, 64, 'Support'),
(1, 39, 67, 'Support'),
(2, 39, 67, 'Support'),
(3, 39, 67, 'Support'),
(4, 39, 67, 'Support'),
(1, 39, 7, 'User'),
(2, 39, 7, 'User'),
(3, 39, 7, 'User'),
(4, 39, 7, 'User'),
(1, 39, 17, 'settings'),
(2, 39, 17, 'settings'),
(3, 39, 17, 'settings'),
(4, 39, 17, 'settings'),
(1, 39, 40, 'settings'),
(2, 39, 40, 'settings'),
(3, 39, 40, 'settings'),
(4, 39, 40, 'settings'),
(1, 39, 49, 'settings'),
(2, 39, 49, 'settings'),
(3, 39, 49, 'settings'),
(4, 39, 49, 'settings'),
(1, 39, 50, 'settings'),
(2, 39, 50, 'settings'),
(3, 39, 50, 'settings'),
(4, 39, 50, 'settings'),
(1, 39, 68, 'settings'),
(2, 39, 68, 'settings'),
(3, 39, 68, 'settings'),
(4, 39, 68, 'settings');