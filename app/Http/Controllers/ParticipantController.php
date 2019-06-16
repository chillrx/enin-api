<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;
use App\CompanyContact;
use App\CompanySocialMedia;
use App\CompanyRevenue;
use App\CompanyRepresentative;
use App\CompanyRepresentativeContact;
use App\ParticipantProduct;

class ParticipantController extends Controller
{

    public function register(Request $request) {
        try {
            $data = $request->all();

            $data['participant']['foundation_year'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['participant']['foundation_year'])));
            
            $data['participant']['other_product'] = $data['activity']['other_activity'];

            $participant = Participant::create($data['participant']);
            
            // Company Contact Phones
            foreach($data['participant']['phones'] as $value) {
                $value['participant_id'] = $participant->id;
                CompanyContact::create($value);
            }
    
            // Social Medias
            foreach($data['participant']['social_medias'] as $value) {
                $value['participant_id'] = $participant->id;
                CompanySocialMedia::create($value);
            }
    
            // Local revenues
            foreach($data['participant']['local_revenues'] as $value) {
                $value['participant_id'] = $participant->id;
                CompanyRevenue::create($value);
            }
    
            // Abroad revenues
            foreach($data['participant']['abroad_revenues'] as $value) {
                $value['participant_id'] = $participant->id;
                CompanyRevenue::create($value);
            }
    
            // Representatives
            if ($data['isRepresentativeValid']) {
                $data['representative']['participant_id'] = $participant->id;
                if ($data['representative']['birthday'])
                    $data['representative']['birthday'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['representative']['birthday'])));
                $representative = CompanyRepresentative::create($data['representative']);

                // Representative phones
                foreach($data['representative']['phones'] as $value) {
                    $value['company_representative_id'] = $representative->id;
                    CompanyRepresentativeContact::create($value);
                }
            }

            foreach($data['representative']['participants'] as $value) {
                $value['participant_id'] = $participant->id;
                if (isset($value['birthday']))
                $value['birthday'] = date('Y-m-d', strtotime(str_replace('/', '-', $value['birthday'])));
                $rep = CompanyRepresentative::create($value);
                
                // Representative phones
                foreach($value['phones'] as $phone) {
                    $phone['company_representative_id'] = $rep->id;
                    CompanyRepresentativeContact::create($phone);
                }
            }
            
            foreach($data['activity']['product_id'] as $value) {
                $product = ['participant_id' => $participant->id, 'product_id' => $value ];
                ParticipantProduct::create($product);
            }

            return response()->json([
                "message" => 'Inscrição feita com sucesso!'
            ], 200);
    
        } catch(Exception $e) {
            return response()->json([
                "message" => 'Erro ao fazer inscrição, tente novamente!'
            ], 400);
        }
    }

}
