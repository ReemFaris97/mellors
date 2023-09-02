<?php

namespace App\Http\Requests\Dashboard\Accident;

use Illuminate\Foundation\Http\FormRequest;

class InvestigationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            $rules = [
                'person_name'=>'nullable',
                'incident_date'=>'nullable',
                'incident_time'=>'nullable',
                'employee'=>'nullable',
                'contractor'=>'nullable',
                'customer'=>'nullable',
                'pedestrian'=>'nullable',
                'location'=>'nullable',
                'address'=>'nullable',
                'head_office_informed'=>'nullable',
                'date'=>'nullable',
                'name_person_informed'=>'nullable',
                'accident_book_completed'=>'nullable',
                'date_entered'=>'nullable',
                'riddor_reportable'=>'nullable',
                'date_reported'=>'nullable',
                'time_eported'=>'nullable',
                'investigation_lead_name'=>'nullable',
                'department_id'=>'nullable',
                'designation'=>'nullable',
                'investigation_assistant_name'=>'nullable',
                'Investigation_designation'=>'nullable',
                'investigation_department_id'=>'nullable',
                'was_incident_witnessed'=>'nullable',
                'are_witnesses_employees'=>'nullable',
                'witnesses_statements_taken'=>'nullable',
                'witnesses_name_one'=>'nullable',
                'contact_phone_no_one'=>'nullable',
                'witnesses_address_one'=>'nullable',
                'witnesses_name_two'=>'nullable',
                'contact_phone_no_two'=>'nullable',
                'witnesses_address_two'=>'nullable',
                'witnesses_name_three'=>'nullable',
                'contact_phone_no_three'=>'nullable',
                'witnesses_address_three'=>'nullable',
                'details'=>'nullable',
                'was_the_incident_work_related'=>'nullable',
                'was_first_aid_administered_at_location'=>'nullable',
                'name_of_first_aider'=>'nullable',
                'details_of_injury'=>'nullable',
                'were_emergency_services_called'=>'nullable',
                'was_person_involved_hospitalised'=>'nullable',

                'Noise'=>'nullable',
                'Noise_desc'=>'nullable',
                'Lighting'=>'nullable',
                'Lighting_desc'=>'nullable',
                'Dust_Fumes'=>'nullable',
                'Dust_Fumes_desc'=>'nullable',
                'Slip_Trip_Hazard'=>'nullable',
                'Slip_Trip_Hazard_desc'=>'nullable',
                'Layout_Design'=>'nullable',
                'Layout_Design_desc'=>'nullable',
                'Vibration'=>'nullable',
                'Vibration_desc'=>'nullable',
                'Damaged_Unstable_Floor'=>'nullable',
                'Damaged_Unstable_Floor_desc'=>'nullable',
                'Weather'=>'nullable',
                'Weather_desc'=>'nullable',
                'Other'=>'nullable',
                'Other_desc'=>'nullable',

                'Fatigue'=>'nullable',
                'Fatigue_desc'=>'nullable',
                'Lack_of_Communication'=>'nullable',
                'Lack_of_Communication_desc'=>'nullable',
                'Distractions'=>'nullable',
                'Distractions_desc'=>'nullable',
                'Change_of_Routine'=>'nullable',
                'Change_of_Routine_desc'=>'nullable',
                'Time_Production_Pressure'=>'nullable',
                'Time_Production_Pressure_desc'=>'nullable',
                'Procedure_No_Followed'=>'nullable',
                'Procedure_No_Followed_desc'=>'nullable',
                'Drugs_or_Alcohol'=>'nullable',
                'Drugs_or_Alcohol_desc'=>'nullable',
                'Attribute_Other'=>'nullable',
                'Attribute_Other_desc'=>'nullable',
               
                'No_Hazard_Identified'=>'nullable',
                'No_Hazard_Identified_desc'=>'nullable',
                'Inadequate_Safe_Procedure'=>'nullable',
                'Inadequate_Safe_Procedure_desc'=>'nullable',
                'Inadequate_Risk_Assessment'=>'nullable',
                'Inadequate_Risk_Assessment_desc'=>'nullable',
                'Inadequate_Controls_in_Place'=>'nullable',
                'Inadequate_Controls_in_Place_desc'=>'nullable',
                'Inadequate_Training'=>'nullable',
                'Inadequate_Training_desc'=>'nullable',
                'Lack_of_Supervision'=>'nullable',
                'Lack_of_Supervision_desc'=>'nullable',
                'Attribute_two_Other'=>'nullable',
                'Attribute_two_Other_desc'=>'nullable',

               
                'Incorrect_Equipment'=>'nullable',
                'Incorrect_Equipment_desc'=>'nullable',
                'Equipment_Failure'=>'nullable',
                'Equipment_Failure_desc'=>'nullable',
                'Inadequate_Maintenance'=>'nullable',
                'Inadequate_Maintenance_desc'=>'nullable',
                'Heavy_or_Awkward'=>'nullable',
                'Heavy_or_Awkward_desc'=>'nullable',
                'Inadequate_Training_two'=>'nullable',
                'Inadequate_Training_two_desc'=>'nullable',
                'Inadequate Guarding'=>'nullable',
                'Inadequate Guarding_desc'=>'nullable',
                'Other_four'=>'nullable',
                'Other_four_desc'=>'nullable',

                'Contributing1'=>'nullable',
                'Corrective_Actions1'=>'nullable',
                'Completed_by_Name1'=>'nullable',
                'Date_to_be_Completed1'=>'nullable',
                'Further_Actions1'=>'nullable',

                'Contributing2'=>'nullable',
                'Corrective_Actions2'=>'nullable',
                'Completed_by_Name2'=>'nullable',
                'Date_to_be_Completed2'=>'nullable',
                'Further_Actions2'=>'nullable',
                
                'Contributing3'=>'nullable',
                'Corrective_Actions3'=>'nullable',
                'Completed_by_Name3'=>'nullable',
                'Date_to_be_Completed3'=>'nullable',
                'Further_Actions3'=>'nullable',
                
                'Contributing4'=>'nullable',
                'Corrective_Actions4'=>'nullable',
                'Completed_by_Name4'=>'nullable',
                'Date_to_be_Completed4'=>'nullable',
                'Further_Actions4'=>'nullable',
                
                'Further_Information'=>'nullable',

                'Report_Completed_By'=>'nullable',
                'Date_Completed'=>'nullable',
                'Signature'=>'nullable',
                'Position'=>'nullable',

                
            ];

        return $rules;

    }
}
