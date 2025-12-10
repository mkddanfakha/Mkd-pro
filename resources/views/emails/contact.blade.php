@component('mail::message')
# Nouveau message de contact - MKD-pro

Vous avez reçu un nouveau message depuis le formulaire de contact de votre site MKD-pro.

## Informations du contact

**Nom :** {{ $name }}

**Téléphone :** {{ $phone }}

**Email :** {{ $email }}

**Entreprise :** {{ $company }}

## Message

{{ $message }}

---

Ce message a été envoyé depuis le formulaire de contact de votre site MKD-pro.

@component('mail::button', ['url' => config('app.url')])
Voir le site
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
