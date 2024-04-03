RO:

Proiectul isi propune sa faca posibila administrarea unei companii aeriene. In acest caz avem nevoie de informatii legate de avioanele disponibile, aeroporturile pe care se opereaza, rutele administrate intre aceste aeroporturi si zborurile ce urmeaza a fi facute.

Astfel, pentru adaugarea unui nou avion vom fi nevoiti sa stim modelul sau, autonomia(pentru a vedea daca poate parcurge trasee mai lungi sau mai scurte) si numarul de locuri. Pentru adaugarea unui nou aeroport vom avea nevoie sa dam explicit id-ul sau(exemplu IAS pentru Iasi), numele si numarul de aterizari si decolari(numarul de procesari maxim zilnic) pe care compania noastra are voie sa le faca intr-o anumita zi pe acel aeroport. Pentru rute vom selecta dintr-un pop-up tupla parinte pentru plecare si sosire si vom mai adauga numarul de km al sau. Pentru tabela zboruri vom selecta de asemeni tuplele parinte pentru id_ruta, id_avion si vom selecta dintr-un meniu drop-down data. Tabela grad de ocupare se autoconstruieste cu coloane in functie de adaugarea unui nou avion sau al unui aeroport, in ea aflandu-se indexii folosirii acestora intr-o anumita zi.


EN:

The project aims to enable the management of an airline. In this case, we need information regarding the available airplanes, the airports operated, the routes managed between these airports, and the flights to be carried out.

Thus, for adding a new airplane, we will need to know its model, autonomy (to see if it can cover longer or shorter routes), and the number of seats. For adding a new airport, we will need to provide its explicit ID (for example, IAS for Iasi), the name, and the number of landings and takeoffs (the maximum daily processing capacity) that our company is allowed to perform on that airport on a given day. For routes, we will select from a pop-up menu a parent tuple for departure and arrival, and we will also add the distance in kilometers. For the flight table, we will also select parent tuples for the route ID, airplane ID, and select the date from a drop-down menu. The occupancy table is auto-built with columns based on adding a new airplane or airport, showing the indices of their usage on a specific day.

ER Diagram:
![image](https://github.com/Stephan-Jacob/project_airport_management/assets/83079613/f4ccb1c6-c083-4fdc-9c8e-30c4e5122fe3)

Home view:
![image](https://github.com/Stephan-Jacob/project_airport_management/assets/83079613/f1104ae0-cdea-4eae-b932-b10f14ff9ab1)

Airports Management View:
![image](https://github.com/Stephan-Jacob/project_airport_management/assets/83079613/47f38c87-a5e5-45b1-8f92-e91d48c2a5a7)
