//A simple snake game made by Rohit Pstel.Contact me at rvprvprvp7824@gmail.com
//Few issues with the game includes (1) The game becomes hard to play after 30-40 points. (2) Very few maps are available for Arcade mode
//(3) Not using graphics slows this game quite a bit.

#include <iostream>
#include <time.h>
#include <cstdio>
#include <windows.h>
#include <conio.h>
#define MAX 20

int Size,posx[50],posy[50],dir[50]={1},lastdirection,food[MAX][MAX]={0},TIMENEWFOOD=20,z=0,INITX,INITY;

void direction();
void chdirection(int );
void setposition(int **a);
void setdirection(int **b);
void movement(int **c);
int printingforclassic(int **d);
void newfood();
void oldfood();
void clearsnakeorboard(int **e,int **k);
void generatingboard(int**f,int );
int printingforarcade(int **g,int**h,int l);
void testingboard(int **i,int **j);
using namespace std;

int main()
{
    int **snake,i,j,k=0,input,TIMEDELAY;
    top:;
    Size=5;
    time_t t;
    time(&t);
    srand((unsigned int) t);
    snake=(int **)calloc(MAX,sizeof(int*));
    for(i=0;i<MAX;i++)
        snake[i]=(int*)calloc(MAX,sizeof(int));
    cout<<endl<<endl<<endl;
    for(i=0;i<80;i++)
        cout<<"=";
    cout<<endl<<"\t\t\t S  N  A  K  E   G  A  M  E "<<endl<<endl;
    for(i=0;i<80;i++)
        cout<<"=";
    cout<<endl<<endl<<"\t\t\t PRESS 1 TO PLAY CLASSIC MODE :: ";
    cout<<endl<<endl<<"\t\t\t PRESS 2 TO PLAY ARCADE MODE :: ";
    cin>>input;
    if(input==1)
    {
        //CLASSIC MODE
        system("CLS");
        cout<<endl<<endl<<endl;
        for(i=0;i<80;i++)
            cout<<"=";
        cout<<endl<<"\t\t\t S  N  A  K  E   G  A  M  E "<<endl<<endl;
        for(i=0;i<80;i++)
            cout<<"=";
        cout<<endl<<endl<<"\t\t\t PRESS 1 TO PLAY ON EASY :: ";
        cout<<endl<<endl<<"\t\t\t PRESS 2 TO PLAY ON MEDIUM :: ";
        cout<<endl<<endl<<"\t\t\t PRESS 3 TO PLAY ON HARD :: ";
        cout<<endl<<endl<<"\t\t\t PRESS 4 TO PLAY ON INSANE :: ";
        cin>>input;
        if(input==1)
            TIMEDELAY=250;
        else if(input==2)
            TIMEDELAY=150;
        else if(input==3)
            TIMEDELAY=75;
        else if(input==4)
            TIMEDELAY=25;
        else
        {
            cout<<"ENTER APPROPRIATE CHOICE :: ";
            goto top;
        }
        INITX=10;
        INITY=10;
        posx[0]=10;
        posy[0]=10;
        setposition(snake);
        setdirection(snake);
        while(1)
        {
            if(k%TIMENEWFOOD==0)
            {
                oldfood();
                newfood();
            }
            if(GetAsyncKeyState(VK_UP))
            {
                chdirection(1);
            }
            if(GetAsyncKeyState(VK_LEFT))
            {
                chdirection(2);
            }
            if(GetAsyncKeyState(VK_DOWN))
            {
                chdirection(3);
            }
            if(GetAsyncKeyState(VK_RIGHT))
            {
                chdirection(4);
            }
            system("CLS");
            movement(snake);
            direction();
            if(printingforclassic(snake)==1)
            {
                free(snake);
                system("CLS");
                fflush(stdin);
                goto top;
            }
            Sleep(TIMEDELAY);
            k++;
        }
        getch();
    }
    else if (input==2)
    {
        //ARCADE MODE
        int level=1,x;
        int **board;
        board=(int **)calloc(MAX,sizeof(int*));
        for(i=0;i<MAX;i++)
            board[i]=(int*)calloc(MAX,sizeof(int));
        arcadetop:;
        restartlevel:;
        system("CLS");
        cout<<endl<<endl<<endl<<endl<<endl<<endl;
        for(i=0;i<80;i++)
        cout<<"=";
        cout<<endl<<"\t\t\t\t L E V E L  "<<level<<endl<<endl;
        for(i=0;i<80;i++)
        cout<<"=";
        cout<<endl<<endl<<"\t\t\t PRESS ANY KEY TO BEGIN :: ";
        getch();
        if(level==1)
        {
            INITX=4;
            INITY=14;
            posx[0]=2;
            posy[0]=14;
            TIMEDELAY=125;
        }
        if(level==2)
        {
            INITX=16;
            INITY=10;
            posx[0]=16;
            posy[0]=10;
            TIMEDELAY=125;
        }
        if(level==3)
        {
            INITX=10;
            INITY=5;
            posx[0]=10;
            posy[0]=5;
            TIMEDELAY=125;
        }
        clearsnakeorboard(snake,board);
        setposition(snake);
        setdirection(snake);
        generatingboard(board,level);
        while(1)
        {
            if(GetAsyncKeyState(VK_UP))
            {
                chdirection(1);
            }
            if(GetAsyncKeyState(VK_LEFT))
            {
                chdirection(2);
            }
            if(GetAsyncKeyState(VK_DOWN))
            {
                chdirection(3);
            }
            if(GetAsyncKeyState(VK_RIGHT))
            {
                chdirection(4);
            }
            movement(snake);
            direction();
            //testingboard(snake,board);
            x=printingforarcade(snake,board,level);
            if(x==1)
            {
                free(snake);
                system("CLS");
                fflush(stdin);
                goto top;
            }
            else if(x==2)
            {
                level++;
                goto arcadetop;
            }
            else if(x==3)
            {
                goto restartlevel;
            }
            Sleep(TIMEDELAY);
            system("CLS");
        }
    }
    else
    {
        cout<<"ENTER A VALID CHOICE :: ";
        fflush(stdin);
        goto top;
    }
}

void setposition(int **a)//initializes the position of snake
{
    for(int p=1;p<Size;p++)
    {
        a[INITY+p][INITX]=1;
        posy[p]=posy[0]+p;
        posx[p]=posx[0];
    }
}

void setdirection(int **b)//saves the last direction to global dir[]
{
    for(int m=0;m<Size;m++)
        dir[m]=1;
    lastdirection=1;
}

void chdirection(int d)//initializes the direction to vertically up
{
    dir[0]=d;
    lastdirection=d;
}

void direction()//sets the direction of rest of the body pieces of snake
{
    int m;
    dir[0]=lastdirection;
    for(m=Size;m>0;m--)
        dir[m]=dir[m-1];
}

void movement(int **c)//Moves the whole body of snake
{
    int x[50],y[50],m;
    for(m=0;m<Size;m++)
    {
        x[m]=0;
        y[m]=0;
        if(dir[m]==1)
            y[m]--;
        else if(dir[m]==2)
            x[m]--;
        else if(dir[m]==3)
            y[m]++;
        else
            x[m]++;
    }
    for(m=0;m<MAX;m++)
        for(int n=0;n<MAX;n++)
            c[m][n]=0;
    posx[Size]=posx[Size-1];
    posy[Size]=posy[Size-1];
    for(m=0;m<Size;m++)
    {
        posx[m]+=x[m];
        posy[m]+=y[m];
        c[posy[m]][posx[m]]=1;
    }
}

int walls(int **e)//checks if snake hits the wall or not
{
    for(int m=0;m<MAX;m++)
    {
        for(int n=0;n<MAX;n++)
        {
            if(m==0 && m==(MAX-1))
                if(e[m][n]==1)
                    return 1;
            else
            {
                if(e[m][1]==1 || e[m][MAX-1]==1)
                    return 1; //hits the wall
            }
        }
    }
    return 0;//dont hit tha wall
}

int printingforclassic(int **d)//printing of all pieces includes snake,board,food,walls
{
    for(int m=0;m<MAX;m++)
    {
        for(int n=1;n<(MAX-1);n++)
        {
            if(m==0 || m==(MAX-1))
            {
                cout<<"---";
            }
            else if(n==1 || n==(MAX-2))
            {
                cout<<" | ";
            }
            else if(d[m][n]==1)
                {
                    cout<<" O ";
                    if(food[m][n]==1)
                    {
                        oldfood();
                        Size+=1;
                    }
                }
            else if(food[m][n]==1)
                {
                    cout<<" & ";
                }
                else
                    cout<<" . ";
            if(d[m][n]==1 && (m==0 ||m==(MAX-1)||d[m][1]==1 || d[m][MAX-1]==1))
            {
                system("CLS");
                cout<<endl<<endl<<"\t\t\t GAME OVER"<<endl<<endl<<"\t\t\t PRESS ANY KEY TO GO TO MAIN MENU :: ";
                fflush(stdin);
                getch();
                return 1;
            }
        }
        cout<<endl;
    }
        cout<<endl<<"\t\t\tSCORE :: "<<Size;
    return 0;
}

void newfood()//generates new food
{
    int p,o;
    p=rand()%MAX;
    o=rand()%MAX;
    food[p][o]=1;
}

void oldfood()//clears out the old food
{
    for(int p=0;p<MAX;p++)
        for(int q=0;q<MAX;q++)
            food[p][q]=0;
}

void clearsnakeorboard(int **e,int **k)//clear the whole screen
{
    int m,n;
    for(m=0;m<MAX;m++)
        for(n=0;n<MAX;n++)
        {
            e[m][n]=0;
            k[m][n]=0;
        }
}

void generatingboard(int**f,int l)//creates board for arcade mode... hard-coded here
{
    int m,n;
    if(l==1)
    {
    for(m=7,n=0;n<11;n++)
        f[m][n]=1;
    for(m=19,n=4;m>10;m--)
        f[m][n]=2;
    for(m=8,n=7;m<17;m++)
        f[m][n]=2;
     for(m=19,n=10;m>10;m--)
        f[m][n]=2;
    for(m=4,n=13;m<19;m++)
        f[m][n]=2;
    for(m=4,n=4;n<13;n++)
        f[m][n]=1;
    f[4][16]=1;
    f[4][17]=1;
    f[7][14]=1;
    f[7][15]=1;
    f[10][16]=1;
    f[10][17]=1;
    f[13][14]=1;
    f[13][15]=1;
    f[16][16]=1;
    f[16][17]=1;
    for(m=17;m<19;m++)
        for(n=16;n<18;n++)
            f[m][n]=3;
    }
    if(l==2)
    {
        for(m=1,n=14;m<15;m++)
            f[m][n]=2;
        for(m=15,n=5;n<14;n++)
            f[m][n]=1;
        for(m=4,n=4;m<16;m++)
            f[m][n]=2;
        for(m=1,n=7;m<12;m++)
            f[m][n]=2;
        for(m=4,n=10;m<15;m++)
            f[m][n]=2;
        for(m=13;m>10;m--)
            for(n=11;n<14;n++)
                f[m][n]=3;
    }
    if(l==3)
    {
        for(m=0,n=8;m<12;m++)
            f[m][n]=2;
        for(m=11,n=6;n<12;n++)
            f[m][n]=1;
        for(m=3,n=12;m<16;m++)
            f[m][n]=2;
        for(m=3,n=13;n<16;n++)
            f[m][n]=1;
        for(m=6,n=15;n<18;n++)
            f[m][n]=1;
        for(m=9,n=13;n<16;n++)
            f[m][n]=1;
        for(m=12,n=15;n<18;n++)
            f[m][n]=1;
        for(m=15,n=13;n<16;n++)
            f[m][n]=1;
        for(m=14,n=9;m<19;m++)
            f[m][n]=2;
        for(m=11,n=6;m<16;m++)
            f[m][n]=2;
        for(m=9,n=4;m<19;m++)
            f[m][n]=2;
        for(m=8,n=4;n<6;n++)
            f[m][n]=1;
        for(m=3,n=5;m<8;m++)
            f[m][n]=2;
        for(m=16;m<18;m++)
            for(n=2;n<4;n++)
                f[m][n]=3;
    }
}

int printingforarcade(int**g,int**h,int l)//prints all things
{
    int m,n,k;
    for(m=0;m<MAX;m++)
    {
        for(n=1;n<MAX-1;n++)
        {
            if(g[m][n]==1 && ((m==0 ||m==(MAX-1)||g[m][1]==1 || g[m][MAX-1]==1) || (h[m][n]==1||h[m][n]==2)))
            {
                system("CLS");
                cout<<endl<<endl<<"\t\t\t GAME OVER"<<endl<<endl<<"\t\t\t PRESS 1 TO GO TO MAIN MENU :: "<<endl;
                cout<<endl<<"\t\t\t PRESS 2 TO RESTART LEVEL "<<l<<" :: ";
                fflush(stdin);
                cin>>k;
                if(k==2)
                    return 3;
                else
                    return 1;
            }
            if(m==0 || m==(MAX-1))
            {
                cout<<"---";
            }
            else if(n==1 || n==(MAX-2))
            {
                cout<<" | ";
            }
            else if(g[m][n]==1)
            {
                cout<<" O ";
            }
            else if(h[m][n]==1)
                {
                    cout<<"---";
                }
            else if(h[m][n]==2)
                {
                    cout<<" | ";
                }
            else if(h[m][n]==3)
                    {
                        cout<<" & ";
                    }
                    else
                    {
                        cout<<" . ";
                    }
        }
        cout<<endl;
        if((g[17][16]==1 ||g[18][16]==1||g[17][17]==1 ||g[18][17]==1)&&(l==1))
        {
            system("CLS");
            for(m=5;m>0;m--)
            {
                system("CLS");
                cout<<endl<<endl<<endl<<"\t\t\tYOU CLEARED LEVEL :: "<<l<<endl<<endl<<"\t\t\tWAIT "<<m <<" SECONDS TO GO TO NEXT LEVEL :: ";
                Sleep(1000);
            }
            return 2;
        }
        if((g[13][11]==1 ||g[13][12]==1||g[13][13]==1 ||g[12][11]==1 || g[12][12]==1 ||g[12][13]==1 ||g[11][11]==1 ||g[11][12]==1 || g[11][13]==1 )&&(l==2))
        {
            system("CLS");
            for(m=5;m>0;m--)
            {
                system("CLS");
                cout<<endl<<endl<<endl<<"\t\t\tYOU WON"<<endl<<endl<<"\t\t\tWAIT "<<m <<"SECONDS TO GO TO NEXT LEVEL :: ";
                Sleep(1000);
            }
            return 2;
        }
        if((g[16][2]==1||g[16][3]==1||g[17][2]==1||g[17][3]==1)&&(l==3))
        {
            system("CLS");
            for(m=5;m>0;m--)
            {
                system("CLS");
                cout<<endl<<endl<<endl<<"\t\t\tYOU WON"<<endl<<endl<<"\t\t\tWAIT "<<m <<"SECONDS TO GO TO NEXT LEVEL :: ";
                Sleep(1000);
            }
            return 2;
        }
    }
    return 0;
}

void testingboard(int **i,int **j)//just to test when creating any board on arcade mode
{
    int m,n;
    for(m=0;m<MAX;m++)
    {
        for(n=1;n<MAX-1;n++)
        {
            if(m==0 || m==(MAX-1))
            {
                cout<<"---";
            }
            else if(n==1 || n==(MAX-2))
            {
                cout<<" | ";
            }
            else if(i[m][n]==1)
            {
                cout<<" O ";
            }
            else if(j[m][n]==1)
                {
                    cout<<"---";
                }
            else if(j[m][n]==2)
                {
                    cout<<" | ";
                }
            else if(j[m][n]==3)
                    {
                        cout<<" & ";
                    }
                    else
                    {
                        cout<<" . ";
                    }
        }
        cout<<endl;
    }
}
