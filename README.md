# PROGETTAZIONE E SVILUPPO DI UN SISTEMA CLOUD DI MONITORAGGIO DI SMART OBJECTS SU RETI ETEROGENEE

Il progetto è composto da 3 moduli:
  - **CoAP**: è il server CoAP, quello che si occupa di monitorare i nodi IoT e pubblicare, tramite i connectors, i dati da essi ricevuti.
  - **CoAP Test Resource**: è un simulatore di un nodo IoT in grado di comunicare al server i dati.
  - **WebInterface**: è l'interfaccia web tramite cui è possibile registrare connectors e actions, oltre che monitorare le notifiche.

Oltre a questi è necessario installare anche un server [MySQL] ove sono salvati i dati degli utenti e le connections impostate tramite WebInterface.


   [MySQL]: <http://www.mysql.com/downloads/>

