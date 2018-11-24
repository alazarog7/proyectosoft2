<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class Administrador implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $num_adm = DB::select("
                                      SELECT COUNT(*) as \"NUMERO\"
                                      FROM
                                      \"TCPD_USUA\" a INNER JOIN \"TCPD_ROL\" b ON a.\"ID_USUA\" = b.\"FK_USUA_ID_USUA_UI\"
                                      WHERE
                                      b.\"FK_PARA_IP_ROL_RI\"=6 AND
                                      a.\"AUD_ESTADO\"=1 AND
                                      b.\"AUD_ESTADO\"=1 AND
                                      b.\"AUD_BAJA_FECHA\" IS  NULL
        ");
        //dd($num_adm[0]);
        //dd($value);
        if($value==7){

            if($num_adm[0]->NUMERO>1){

                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Solo existe un administrador, no puede cambiar';
    }
}
