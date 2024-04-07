#!/bin/bash

# Array of controller names
controllers=("StudentController" "GradeLevelController" "SectionController" "SubjectController" "TeacherController" "ClassController" "PaymentsController" "SettingsController")

# Loop through each controller name and create the controller
for controller in "${controllers[@]}"
do
    php artisan make:controller $controller -r
done
