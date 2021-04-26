#include<iostream>
using namespace std;
class passenger
{
	protected:
	char firstname[20];
	char lastname[20];
	char email[30];
	char address[20];
	char phone[20];
	char dest[20];
	char PNR[20];
	char pas_class[20];
	char seat_no[10];
	int age;
	char ID_number[20];
	int eco_fare;
	int busi_fare;
	int payment;
	
	public:
	void getdata()
	{
		cout<<"\n\t\t@@@@@@@_PASSENGER_DETAILS_@@@@@@@@@"<<endl;
		cout<<"\n\nEnter the first name:-"<<endl;
		cin>>firstname;
		cout<<"Enter the last name:-"<<endl;
		cin>>lastname;
		cout<<"Enter email address:-"<<endl;
		cin>>email;
		cout<<"Enter address:-"<<endl;
		cin>>address;
		cout<<"Enter age:-"<<endl;
		cin>>age;
		cout<<"Enter the phone number:-"<<endl;
		cin>>phone;
		cout<<"Enter ID number:-"<<endl;
		cin>>ID_number;
		cout<<"Enter destination:-"<<endl;
		cin>>dest;
		cout<<"Enter PNR:-"<<endl;
		cin>>PNR;
		cout<<"Enter passenger class:-"<<endl;
		cin>>pas_class;
		cout<<"Enter seat no.:-"<<endl;
		cin>>seat_no;
		cout<<"Enter economy class fare:-"<<endl;
		cin>>eco_fare;
		cout<<"Enter business class fare:-"<<endl;
		cin>>busi_fare;
		cout<<"Enter total payment:-"<<endl;
		cin>>payment;
	}
	void display()
	{
	cout<<"\n\nFirst name is:-"<<firstname<<endl;
	cout<<"Last name is:-"<<lastname<<endl;
	cout<<"Email address is:-"<<email<<endl;
	cout<<"Passenger address is:-"<<address<<endl;
	cout<<"Mobile No:-"<<phone<<endl;
	cout<<"ID number is:-"<<ID_number<<endl;
	cout<<"Destination is:-"<<dest<<endl;
	cout<<"PNR is:-"<<PNR<<endl;
	cout<<"Passenger class is:-"<<pas_class;
	cout<<"Passenger seat no. is:-"<<seat_no<<endl;
	cout<<"Economy class fare is:-"<<eco_fare;
	cout<<"Business class fare is:-"<<busi_fare;
	cout<<"Total payment is:-"<<payment<<endl;
	}
};
class eco_class:public passenger
{
	
};

class busi_class:public passenger
{
	
};

int main()
{
	eco_class e;
	e.getdata();
	cout<<"\nDetails of economy class passengers\n";
	e.display();
	
	busi_class b;
	b.getdata();
	cout<<"\nDetails of business class passengers\n";
	b.display(};
		  
}		  
