#include <stdio.h>
#include <stdlib.h>

//Increment des boucles
int i,j,reprise;

//Constante du tableau des mois de l'année dans un tableau de caractères.
const char mois[12][10] = {"JANVIER","FEVRIER","MARS","AVRIL","MAI","JUIN","JUILLET","AOUT","SEPTEMBRE","OCTOBRE","NOVEMBRE","DECEMBRE"};

//Tableau contenant les noms des 5 villes.
char nomVilles[5][40];

//Tableaux des precipitations et temperatures mensuelles.
float mois_precipitation[5][12];
float mois_temperature[5][12];

//Tableaux des moyennes des precipitations et temperatures.
float moy_ville_precipitation[5];
float moy_ville_temperature[5];

//Renvoie la moyenne des éléments d'un tableau de n éléments de type FLOAT
float cal_moyenne(float tab[],int n)
{
    float t=0.0,moy;
    int i;
    for(i=0; i<n; i++)
    {
        t += tab[i];
    }
    moy = t / n;
    return moy;
}

//Procedure affichant les saisie dans une matrice
void affichage(int ligne,int n,float tab[ligne][n])
{
    int i;
    printf("|");
    for(i=0; i<n; i++)
    {
        printf(" %.2f |",tab[ligne][i]);
    }
    printf("\n");
}

void precipitation()
{
    /* **** Saisie des precipitations
    * PAR VILLE
    * PAR MOIS
    * VERIFICATION DES SAISIE DE PRECIPITATIONS
    * **** Calcul des moyennes de
    *      precipitations par ville et par année
    */
    printf("- - PROGRAM DE CALCUL DE PRECIPITATION\n\n- SAISIE DES VILLES -\n");
    for(i=0; i<5; i++)
    {

        printf("-> Nom de la ville %d: ",i+1);
        scanf("%s",&nomVilles[i]);
        do
        {
            printf("- SAISIE DES PRECIPITATIONS [ %s ]-\n",nomVilles[i]);
            for(j=0; j<12; j++)
            {
                printf("-> %s : ",mois[j]);
                scanf("%f",&mois_precipitation[i][j]);
            }
            //Verification de la saisie pour le mois
            printf("[%s] => ",nomVilles[i]);
            affichage(i,12,mois_precipitation);

            //Calcul de la moyenne des precipitations de la ville pour l'année
            moy_ville_precipitation[i] = cal_moyenne(mois_precipitation[i],12);
            printf("\nMoyenne des precipitations de [%s] : %.2f ",nomVilles[i],moy_ville_precipitation[i]);

            //Reprise ou pas 0: Continuer / 1: Reprendre
            printf("\nSaisie [%s] correcte ? 1 pour reprendre / 0 pour Continuer : ",nomVilles[i]);
            scanf("%d",&reprise);

        }
        while(reprise != 0);
    }
    //Afficher la saisie entière
    printf("-------------> SAISIE DES 5 VILLES <--------------------\n\n");
    for(i=0; i<5; i++)
    {
        printf("[%s] => ",nomVilles[i]);
        affichage(i,12,mois_precipitation);
        printf("\n");
    }
    //calcul precipitation moyenne des villes pour l'année et affichage
    printf("------------------------------------------------\n");
    printf("Precipitation moyenne annuelle : %.2f mm\n",cal_moyenne(moy_ville_precipitation,5));
    printf("------------------------------------------------\n");

}

void temperature()
{
    /* **** Saisie des temperatures
    * PAR VILLE
    * PAR MOIS
    * VERIFICATION DES SAISIE DE temperatures
    * **** Calcul des moyennes de
    *      temperatures par ville et par année
    */
    printf("- - PROGRAM DE CALCUL DE PRECIPITATION\n\n- SAISIE DES VILLES -\n");
    for(i=0; i<5; i++)
    {

        printf("-> Nom de la ville %d: ",i+1);
        scanf("%s",&nomVilles[i]);
        do
        {
            printf("- SAISIE DES TEMPERATURES [ %s ]-\n",nomVilles[i]);
            for(j=0; j<12; j++)
            {
                printf("-> %s : ",mois[j]);
                scanf("%f",&mois_temperature[i][j]);
            }
            //Verification de la saisie pour le mois
            printf("[%s] => ",nomVilles[i]);
            affichage(i,12,mois_temperature);

            //Calcul de la moyenne des precipitations de la ville pour l'année
            moy_ville_temperature[i] = cal_moyenne(mois_temperature[i],12);
            printf("\nMoyenne des temperatures de [%s] : %.2f ",nomVilles[i],moy_ville_temperature[i]);

            //Reprise ou pas 0: Continuer / 1: Reprendre
            printf("\nSaisie [%s] correcte ? 1 pour reprendre / 0 pour Continuer : ",nomVilles[i]);
            scanf("%d",&reprise);

        }
        while(reprise != 0);
    }
    //Afficher la saisie entière
    printf("-------------> SAISIE DES 5 VILLES <--------------------\n\n");
    for(i=0; i<5; i++)
    {
        printf("[%s] => ",nomVilles[i]);
        affichage(i,12,mois_temperature);
        printf("\n");
    }
    //calcul temperature moyenne des villes pour l'année et affichage
    printf("------------------------------------------------\n");
    printf("Temperature moyenne annuelle : %.2f Degre Celcuis\n",cal_moyenne(moy_ville_temperature,5));
    printf("------------------------------------------------\n");

}
int main()
{
    int choix;
    printf("Veuillez choisir : \n\t-->( 1 ) pour calculer la precipitation moyenne annuelle\n\t-->( 2 ) pour calculer la temperature moyenne annuelle \nChoisir :  ");
    scanf("%d",&choix);
    switch(choix)
        {
        case 1:
            precipitation();
        case 2:
            temperature();
        default:
            printf("Aucun choix valide.");
        }
    return 0;
}
