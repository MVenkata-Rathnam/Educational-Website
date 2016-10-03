#include<stdio.h>
#include<stdlib.h>
#include<conio.h>
typedef struct bst{
       // char name[80];
        int no;
        int time;
        float amount;
        struct bst *right;
        struct bst *left;
        }node;
        node *root=NULL,*temp1;
         struct array{
              //    char name1[80];
                  int no;
        int time;
        float amount;
        }stack[50];
       void inorder2(node *,int);
       void inorder3(node *,int);
       void inorder1(node*);
       void print(void);
       void insert(void);
       void find_min(void);
        void find_max(void);
        void display(void);  
        void insert_node(node *,node *);
        void find_n(void);
        void update(void);
        void pop(void);
        node* findmin(node*);
        node* deltree(node *,float);
//stacks stack[100];
void pop(void);
void find_n(void);
void update(void);
int k;
int top=-1,n;
int main(){
    int ch,ch2;
    
    printf("\n \t\t----TELEPHONE INVENTORY MANAGEMANT SYSTEM------\t\n");
    printf("\n READ THE TERMS AND CONDITIONS CAREFULLY 1.THERE MUST BE A MINIMUM OF THREE PERSONS GROUP\n");
    printf("\n2.AMONG THE GROUP ONLY ONE CAN HAVE 2 DAYS OF FREE SERVICE WHO HAS OPTER FOR 2 DAY PLAN OTHERS MUST PAY\n RS20/day CHOOSE YOUR TIME PLAN in days PLAN\n");
    do{
    printf("\n1.ENTER YOUR PLAN 2.PRINT THE BILL 3.FIND KTH MINIMUM PLAN TAKEN \n"); 
    printf("4.FIND KTH MAXIMUM PLAN ADOPTED 5.PRINT ALL THE PLANS ADOPTED SO FARIN INCREASING ORDER OF AMOUNT\n");
    printf("6.LAST ADOPTED PLAN 7.Nth ADOPTED PLAN 8.UPDATE ANY PLAN \n");
    printf("\nenter your choice\n");
    scanf("%d",&ch);
    switch(ch){
    case 1:
                         insert();
                         break;
   case 2:
           print();
           break;
case 3:
     find_min();
     break;
     case 4:
          find_max();
          break;
          case 5:
               display();
               break;
               case 6:
                    pop();
                    break;
                    case 7:
                         find_n();
                         break;
                         case 8:
                              update();
                              break;
                              }
                              printf("\n do you want to continue 1.YES 0.NO\n");
                              scanf("%d",&ch2);
                              }while(ch2==1);
printf("\t========\\***HAVE A GREAT DAY******/=========\t");
getch();
return 0;
}
void insert(void){
    
     int i;
     printf("\n enter total no of people adopting plans \n");
     scanf("%d",&n);
     for(i=0;i<n;i++){
                       node *newnode;
                      newnode=(node *)malloc(sizeof(node));
                      newnode->left=NULL;
                      newnode->right=NULL;
                      ++top;
                      printf("\nenter %d user id\t",i+1);
                      scanf("%d",&stack[i].no);
                      printf("\nenter %d time-period\t",i+1);
                       scanf("%d",&stack[i].time);
                      newnode->no= stack[i].no ;
                     newnode->time= stack[i].time;
                     if(newnode->time > 2)
                      newnode->amount=(newnode->time-2)*25;
                      else
                     newnode->amount=0;
                  //   printf("\n n is %d newnode->amount is %f newnode->no is %ld newnode->time id %d",n,newnode->amount,newnode->no,newnode->time);
                      //newnode->name=stack[i].name1;
                     
                      stack[i].amount=newnode->amount;
                      if(root==NULL)
                      root=newnode;
                      else
                      insert_node(root,newnode);
                      }
                      }
                      
                       void insert_node(node *t,node *newnode){
      if(t->amount > newnode->amount){
                                if(t->left==NULL)
                                t->left=newnode;
                                else
                                insert_node(t->left,newnode);
                                }
else {
if(t->right==NULL)
t->right=newnode;
else
insert_node(t->right,newnode);
}
}

void print(void){
     int i,flag=0;
      int ph;
     printf("\n enter the user id  no to find out the bill amount\n");
     scanf("%d",&ph);
     printf("\nuser-id\tplan period\t amount\n");
        for(i=0;i<n;i++){
                         if(stack[i].no==ph)  {
                                              printf("%d\t\t%d\t%f\n",stack[i].no,stack[i].time,stack[i].amount);
                                              flag=1;
                                              break;
                                              }
                                              }
                                              if(!flag)
                                              printf("\n not found\n");
                                              }
                                                      
                              void find_min(void){
                                   int k;
                                   printf("enter the value of k\n");
                                   scanf("%d",&k);
                                   printf("\n%dth minimum amount plan amount bill is \n",k);
                                     printf("\nuser-id\tplan period\t amount\n");
                                   inorder2(root,k);
                                   }
                                    void inorder2(node *t,int k){
                                         static int count=0;
     if(t!=NULL){
                 inorder2(t->left,k);
                 count++;
                  if(count==k){
                    printf("\n%d\t\t%d\t%f\n",t->no,t->time,t->amount);
                    }
                 inorder2(t->right,k);
                 }
     }  
     
     void inorder3(node *t,int k){
                                         static int count=0;
     if(t!=NULL){
                 inorder3(t->left,k);
                 count++;
                  if(count==k){
                    printf("\n%d\t\t%d\t%f\n",t->no,t->time,t->amount);
                    }
                 inorder3(t->right,k);
                 }
     }  
     void find_max(void){
                                   int k,m;
                                   printf("enter the value of k\n");
                                   scanf("%d",&k);
                                   printf("%dth max value is \n",k);
                                     printf("\nuser-id\tplan period\t amount\n");
                                   m=(n-k)+1;
                                   inorder3(root,m);
                                   }
            void display(void){
                 printf("\ndisplaying data\n");
                 printf("\nmobileno\tplantaken\tamount\n");
                 inorder1(root);
                 }
                 
                   void inorder1(node *t){
                                        // static int count=0;
     if(t!=NULL){
                 inorder1(t->left);
                 //count++;
                //  if(count==k){
                    printf("\n%d\t\t%d\t%f\n",t->no,t->time,t->amount);
                  //  }
                 inorder1(t->right);
                 }
     }  
        
        void pop(void){
             printf("\nlast entered entry is\n");
                 printf("\nuser-id\tplan period\t amount\n");
                 if(top<50){
                  printf("\n%d\t\t%d\t%f\n",stack[top].no,stack[top].time,stack[top].amount);
                  top--;
                  }
                  else
                  printf("\n stack empty\n");
                  }
                  void find_n(void){
                       int n;
                       printf("\n enter the nth entry  to find\n");
                       scanf("%d",&n);
                       printf("\nuser-id\tplan period\t amount\n");
                       printf("\n%d\t\t%d\t%f\n",stack[n-1].no,stack[n-1].time,stack[n-1].amount);
                       }
                       
                       void update(void){
                            int id,i;
                            float old;
                            printf("\n enter the user id that has to be updated\n");
                            scanf("%d",&id);
                            for(i=0;i<n;i++)
                            {
                                            if(stack[i].no==id){
                                                                printf("\nenter new values foruser id-%d",id);
                                                                 node *newnode,*temp;
                                                                 old=stack[i].amount;
                      newnode=(node *)malloc(sizeof(node));
                      newnode->left=NULL;
                      newnode->right=NULL;
                      printf("\nenter new time-period for user-%d\t",id);
                       scanf("%d",&stack[i].time);
                      newnode->no= stack[i].no ;
                     newnode->time= stack[i].time;
                      if(newnode->time > 2)
                      newnode->amount=(newnode->time-2)*25;
                      else
                     newnode->amount=0;                          
                             stack[i].amount=newnode->amount;
                             
                           deltree(root,old);
                           if(root==NULL)
                      root=newnode;
                      else
                      insert_node(root,newnode);
                            printf("\n records successfully updated\n");
                            }
                            }
                            }
                            
                            
                           node* deltree(node *t,float num){
      if(t->amount >num)
     t->left=deltree(t->left,num);
     else if(t->amount < num)
     t->right=deltree(t->right,num);
     else if(t->left && t->right){
          temp1=findmin(t->right);
          t->amount=temp1->amount;
          t->no=temp1->no;
          t->time=temp1->time;
          t->right=deltree(t->right,temp1->amount);
          } 
     else{
          temp1=t;
     if(t->left==NULL)
     t=t->right;
     else if(t->right==NULL)
     t=t->left;
     free(temp1);
     }
     return t;
     } 
                         
                          node* findmin(node *t){
      if(t==NULL){
      printf("\n tree not found\n");
      return NULL;
      }
      while(t->left!=NULL){
                           t=t->left;
                           }
                           return t;
                           } 
