import { usePage } from '@inertiajs/vue3'

export default function __ (key,replacements={}) {
   let translation=usePage().props.translations[key] || key;


   Object.keys(replacements).forEach((replacementKey)=>{
         translation=translation.replace(':'+replacementKey,replacements[replacementKey]);
    });

    return translation;


};