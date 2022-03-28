#include <stdio.h>
#include <stdlib.h>
#include <string.h>

char old_numero[8], new_numero[10], detect[1];
char new_moov[10] = "01",new_mtn[10] = "05",new_orange[10] = "07";

//Verifier la validité du numero saisi
int verification(char numero[])
{
    //Verifier la longueur et que le numero debute pas par 00
    if( strlen(numero) != 8 || (numero[0] == '0' && numero[1] == '0') )
    {
        return 0;
    }
    else
    {
        return 1;
    }
}

int main()
{

    printf("\n- - - CONVERTISSEUR NUMERO 8 -> 10 - - -\n");
    printf("Entrez un numero de telephone (8) chiffres : ");
    scanf("%s",&old_numero);

    if(!verification(old_numero))
    {
        //Contraindre à saisir un numéro valide
        do
        {
            printf("[!!!] Numero de telephone (8) chiffres valide svp : ");
            scanf("%s",&old_numero);
        }
        while(!verification(old_numero));
    }

    /*En réalité les numéro mobile de 8 chiffres se distinguent
     * des différents operateurs par le deuxième chiffre.
     */
    //Detection du segond chiffre du numéro à 8 chiffres.
    detect[0] = old_numero[1];

    switch(detect[0])
    {
    case '0':
        printf("\n\n[MOOV ");
        strcat(new_moov,old_numero);
        strcat(new_numero,new_moov);
        break;
    case '1':
        printf("\n\n[ MOOV ");
        strcat(new_moov,old_numero);
        strcat(new_numero,new_moov);
        break;
    case '2':
        printf("\n\n[ MOOV ");
        strcat(new_moov,old_numero);
        strcat(new_numero,new_moov);
        break;
    case '3':
        printf("\n\n[ MOOV ");
        strcat(new_moov,old_numero);
        strcat(new_numero,new_moov);
        break;
    case '4':
        printf("[ MTN ");
        strcat(new_mtn,old_numero);
        strcat(new_numero,new_mtn);
        break;
    case '5':
        printf("\n\n[ MTN ");
        strcat(new_mtn,old_numero);
        strcat(new_numero,new_mtn);
        break;
    case '6':
        printf("\n\n[ MTN ");
        strcat(new_mtn,old_numero);
        strcat(new_numero,new_mtn);
        break;
    case '7':
        printf("\n\n[ ORANGE ");
        strcat(new_orange,old_numero);
        strcat(new_numero,new_orange);
        break;
    case '8':
        printf("\n\n[ ORANGE ");
        strcat(new_orange,old_numero);
        strcat(new_numero,new_orange);
        break;
    case '9':
        printf("\n\n[ ORANGE ");
        strcat(new_orange,old_numero);
        strcat(new_numero,new_orange);
        break;
    default:
        printf("Aucun choix valide.");
    }
    printf("%s ] nouveau numero, 10 chiffres : [ %s ]\n",old_numero,new_numero);

    return 0;
}
