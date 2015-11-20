//Feel free to go ahead and modify it.. Made by Rohit Patel and his team.. E-Mail :: rvprvprvp7824@gmail.com

#include <stdio.h>
#include <stdlib.h>
#include<string.h>

int address[27]={0}; //This indicates the byte address of words starting with new alphabets from the database
int totalwords=1;
void printfile(FILE *); //To  print the whole dictionary
void line(); //Print the line of '-'
void initialize(FILE *); //Initialise the address array and totalwords array 
void searchbyindex(FILE *); //Searches a given word on base of index
void getword(FILE *,int,char word[]); //Fetches the word and copies to word array
int search(FILE *,char ex[],int container[]); //Searches the input word from the dictionary and returns byte address of matched words into container array
void firstcap(char s[]); //Capitalizes first letter of word
void getrecordbyindex(FILE *p); //Prints the record

int main()
{
    int choice,i,j,k,searchedwords[20],result,num,option;
    char tosearch[20],ch,cha;
    FILE *p;
    p=fopen("DATABASE.txt","r");
    printf("\n");
    line();
    printf("\n\n\t\t\tS I M P L E   D I C T I O N A R Y\n\n\n");
    line();
    printf("\n\n\n\n\t\t\t PRESS ANY KEY TO CONTINUE\n\n\n\n");
    printf("\n\n\t\t\t\t\t\tCREATED BY :: \n\n\t\t\t\t\t\tROHIT PATEL  - 140070107039\n\n\t\t\t\t\t\tRUSHI PATEL  - 140070107040\n\n\t\t\t\t\t\tHARDIK PATEL - 140070107034");
    initialize(p);
    //for(i=0;i<27;i++)
     //   printf("\n%d->%d",i,address[i]); //checking byte address of each new character
    getch();
    while(1)
    {
        system("CLS");
        printf("\n\n");
        line();
        printf("\n\n\t\t\t\tM E N U");
        printf("\n\n\n");
        line();
        printf("\n\n\n\n\t\t\tENTER 1 TO SEARCH A WORD\n\n\t\t\tENTER 2 TO VIEW THE DICTIONARY\n\n\t\t\tENTER 3 TO SEARCH INDEX WISE\n\n\t\t\tENTER 4 TO EXIT\n\n\t\t\t\tENTER YOUR CHOICE :: ");
        scanf("%d",&choice);
        if(choice==1)
        {
            tosearch[0]='\0';
            j=0;
            system("CLS");
            printf("\n\n\t\tEnter the word to search :: ");
            ch=getch();
            while(ch!=' ')
            {
                system("CLS");
                if((int)(ch)!=8)
                {
                    tosearch[j++]=ch;
                    tosearch[j]='\0';
                }
                else
                {
                    if(j>0)
                        tosearch[--j]='\0';
                }
                firstcap(tosearch);
                printf("\n\n\t\tEnter the word to search :: ");
                printf("%s\n\n",tosearch);
                if(tosearch[0]!='\0')
                {
                    result=search(p,tosearch,searchedwords);
                    if(result!=0)
                    {
                        printf("\t\tThe words which match your query are ::\n\n");
                        for(i=0;i<result;i++)
                        {
                            k=0;
                            fseek(p,searchedwords[i],0);
                            while((cha=fgetc(p))!='-')
                            {
                                k++;
                                printf("%c",cha);
                            }
                            while(k<15)
                            {
                                printf(" ");
                                k++;
                            }
                            printf("- ");
                            while((cha=fgetc(p))!='*')
                                printf("%c",cha);
                            printf("\n");
                        }
                    }
                    else
                        printf("\n\n\tNo RESULT FOUND\n");
                }
                ch=getch();
                if((int)(ch)==13)
                    break;
            }
            printf("\n\n\t\tENTER ANY KEY TO GO TO MENU :: ");
            getch();
        }
        else if(choice==2)
        {
            printfile(p);
            printf("\n\n\t\tENTER 1 TO GO BACK TO MENU :: ");
            scanf("%d",&choice);
            if(choice!=1)
                break;
        }
        else if(choice==3)
        {
            system("CLS");
            printf("\n\n\t\tEnter the INDEX:: ");
            scanf("%d",&num);
            while(num<0||num>totalwords+1)
            {
                printf("\n\n\t\tEnter word in range of 0 to %d\n\n\n\t\tEnter the INDEX:: ",totalwords);
                scanf("%d",&num);
            }
            fseek(p,num*50,0);
            getrecordbyindex(p);
            printf("\n\n\t\tENTER ANY KEY TO GO TO MENU :: ");
            getch();
        }
        else if(choice==4)
            break;
        else
        {
            printf("ENTER VALID CHOICE");
        }
    }
    return 0;
}

void printfile(FILE *p)
{
    fseek(p,0,0);
    char ch,word[50];
    int i=0,j,flag=0,count=0,wordno=1,totalpages=totalwords/10,pageno=1;
    while(pageno<=totalpages+1)
    {
        system("CLS");
        line();
        printf("\n\n\t\t\t\tALL WORDS\n\n\n");
        line();
        printf("\n\n\tINDEX\tWORDS\t\tMEANING\n\n\t%d",wordno);
        if(wordno<10)
            for(i=0;i<7;i++)
                printf(" ");
            else if(wordno<100)
                for(i=0;i<6;i++)
                    printf(" ");
            else
                for(i=0;i<5;i++)
                    printf(" ");
        while((ch=fgetc(p))!='[')
        {
            if(ch=='\n')
            {
                count=0;
                wordno++;
                if((wordno-1)%10==0)
                    break;
                if(wordno!=(totalwords+1))
                    printf("\n\t%d",wordno);
                if(wordno<10)
                    for(i=0;i<7;i++)
                        printf(" ");
                else if(wordno<100)
                    for(i=0;i<6;i++)
                        printf(" ");
                else
                    for(i=0;i<5;i++)
                        printf(" ");
            }
            else if(ch=='-')
            {
                j=16-count;
                count=0;
                for(i=0;i<j;i++)
                    printf(" ");
            }
            else if(ch=='*')
                printf(" ");
            else
            {
                printf("%c",ch);
                count++;
            }
        }
        if((pageno-1)*10+11<=totalwords)
            printf("\n\n\t\tDisplaying %d to %d words out of total %d words",(pageno-1)*10+1,pageno*10,totalwords);
        else
            printf("\n\n\t\tDisplaying %d to %d words out of total %d words",(pageno-1)*10+1,totalwords,totalwords);
        getch();
        pageno++;
    }
}

void line()
{
    int i;
    for(i=0;i<27;i++)
        printf(" * ");
}

void initialize(FILE *p)
{
    int flag=0,i=0;
    char ch,prev='a';
    address[i++]=0;
    fseek(p,0,0);
    while((ch=fgetc(p))!='[')
    {
        if(flag==1)
        {
            if(ch!=prev)
            {
                prev=ch;
                address[ch-'A']=ftell(p);
            }
        }
        flag=0;
        if(ch=='\n')
        {
            flag=1;
            totalwords++;
        }
    }
    totalwords--;
    fseek(p,0,0);
}

void getword(FILE *p,int loc,char word[])
{
    fseek(p,0,0);
    int i=0;
    char ch;
    fseek(p,loc,0);
    while((ch=fgetc(p))!='-')
          word[i++]=ch;
    word[i]='\0';
}

int search(FILE *p,char ex[],int container[])
{
    int i,j,k,w=0,n,l,flag,flag1,count=0;
    char ch,t[20];
    n=ex[0]-'A';
    i=ex[0]-'A';
    j=strlen(ex);
    flag=address[i];
    while(n==ex[0]-'A')
    {
        flag1=0;
        fseek(p,flag-1,0);
        i=0;
        while((ch=fgetc(p))!='-')
            t[i++]=ch;
        t[i]='\0';
        if(t[0]!=ex[0])
            n++;
        fseek(p,flag,0);
        for(k=0;ex[k]!='\0' && t[k]==ex[k];k++);
        if(k==j)
                flag1=1;
        if(flag1==1)
            container[w++]=flag-1;
        l++;
        flag=flag+50;
    }
    return w;
}

void firstcap(char s[])
{
     if(s[0]>=97  && s[0]<=122 )
     {
         s[0]= s[0] - 32;
     }
     int n=strlen(s),i;
     for(i=1;i<n;i++)
        s[i]=tolower(s[i]);
}

void getrecordbyindex(FILE *p)
{
    char ch;
    printf("\n\n\t\tThe Word is :: ");
    while((ch=fgetc(p))!='-')
        printf("%c",ch);
    printf("\n\n\t\tThe Meaning is :: ");
    while((ch=fgetc(p))!='*')
        printf("%c",ch);
    printf("\n");
}
