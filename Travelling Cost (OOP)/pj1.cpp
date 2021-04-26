#include<iostream>
#include<math.h>
#include<stdlib.h>
#include<iomanip>
using namespace std;
class passengers
{
	protected:
		int economy,business,total_passengers,capacity;
	public:
	    void passengercount();
	    int eco_pas()
	    {
	    	return economy;
		}
		int busi_pas()
		{
			return business;
		}
		int total_pasngr()
		{
			total_passengers=economy+business;
			return total_passengers;
		}
		void pas_display();	
};
void passengers::passengercount()
{
	cout<<"Enter plane capacity :: ";
    cin>>capacity;
	cout<<"Passengers flying economy ::";
	cin>>economy;
	cout<<"Passenger flying business class ::";
	cin>>business;
}
void passengers::pas_display()
{
	cout<<setw(40)<<"Economy Passengers :: "<<economy<<endl;
	cout<<setw(40)<<"Business Passengers :: "<<business<<endl;	
}

class log
{
	protected:
		char source[20];
		char destination[20];
		int distance;
	public:
		void log_data();
		void log_display();
};
void log::log_data()
{
	cout<<"Source :: ";
	cin>>source;
	cout<<"Destination :: ";
	cin>>destination;
	cout<<"Distance :: ";
	cin>>distance;
}
void log::log_display()
{
	cout<<setw(39)<<"Source ::"<<source<<setw(20)<<"Destination :: "<<destination<<endl;
	cout<<setw(40)<<"Distance :: "<<distance<<endl;
}

class time
{
	protected:
	    float dept_time,arrival_time,flying_time;
	public:
		void time_data();
		float nettime()
		{
			return flying_time;
	    }
        void time_display();
};
void time::time_data()
{	
	cout<<"Scheduled Departure in 24 hour format:: ";
	cin>>dept_time;
	cout<<"Scheduled Arrival in 24 hour format:: ";
	cin>>arrival_time;
	cout<<endl;
	flying_time=arrival_time-dept_time;
}
void time::time_display()
{
	cout<<setw(40)<<"Dept :: "<<dept_time<<setw(20)<<"Arrival :: "<<arrival_time<<endl;
	cout<<setw(40)<<"Flying hours :: "<<flying_time<<endl;
}

class airplane:public passengers,public log,public time
{
	protected:
		
		float economy_fare,business_fare;
		int weight;
	public:
		airplane()
		{
			economy_fare=0;
			business_fare=0;
			weight=83000;
		}
		
		void data()
		{
			cout<<"Enter log\n";
			log_data();
			cout<<"Enter passenger numbers(180)\n";
			passengercount();
			cout<<"Enter time data\n";
			time_data();
			
		}
		float fuel();
		float landing_charges();
		void housing_cahrges();
		void airport_tax();
		float ecofare();
		float busifare();
		
};

float airplane::fuel()
{
	
	float fuel_cost_perseat,total_fuel_cost;
	fuel_cost_perseat=3.68*3.785*58.20*flying_time;
	total_fuel_cost=fuel_cost_perseat*capacity;
	economy_fare+=fuel_cost_perseat;
	business_fare+=fuel_cost_perseat;
	return total_fuel_cost;
	//display()
	//cout<<"fuel_cost_perseat :: "<<fuel_cost_perseat<<endl;
	//cout<<"total_fuel_cost :: "<<total_fuel_cost<<endl;		
}
float airplane::landing_charges()
{
	float charge,charge_perperson;
	charge=1848+(weight-20000)/1000*231;
	charge_perperson=charge/total_pasngr();
	cout<<endl;
	economy_fare+=charge_perperson;
	business_fare+=charge_perperson;
	return charge,charge_perperson;
	
}
void airplane::airport_tax()
{
	economy_fare+=500+77+130;
	business_fare+=500+77+130;
}
float airplane::ecofare()
{
	return economy_fare;
}
float airplane::busifare()
{
	return business_fare;
}
class flight
{
	protected:
	airplane a[3];
	int people[3],total_people;
	float airtime[3],parktime,hangtime,net_flying_hours;
	float parkcost,hangarcost,navcost,perks,ground_maintainece;
	float total_fuel[3],land_total[3];
	float ecofare[3],bussfare[3],basefare[3],finalecofare[3],finalbusifare[3];
	float tax_eco[3],tax_busi[3],gst,servicetax;
	float grossprofit,netprofit,revenue;
	public:
		flight()
		{
			total_people=0;
			net_flying_hours=0;
			hangtime=12;
			navcost=7560.70;
			ground_maintainece=0;
			grossprofit=0;
			netprofit=0;
			revenue=0;
			gst=0;
			servicetax=0;
		}
		void fdata();
		void processtime();
		void processpeople();
		void process_parking();
		void process_halt();
		void process_nav();
		void process_basefare();
		void process_perks();
		void process_groundcost();
		void process_finalfare();
		void process_tax();
		void process_profit();
		void display();
};
void flight::fdata()
{
	int i;
	for(i=0;i<3;i++)
	{
		a[i].data();
	    total_fuel[i]=a[i].fuel();
	    land_total[i]=a[i].landing_charges();
	    a[i].airport_tax();
	    ecofare[i]=a[i].ecofare();
	    bussfare[i]=a[i].busifare();
	    people[i]=a[i].total_pasngr();
	    airtime[i]=a[i].nettime();
	}
}
void flight::processtime()
{
	int i;
	for(i=0;i<3;i++)
	net_flying_hours+=airtime[i];
	parktime=12-net_flying_hours;
}
void flight::processpeople()
{
	int i;
	for(i=0;i<3;i++)
	total_people+=people[i];
}
void flight::process_parking()
{
	parkcost=72+(83000-40000)/1000*3.40*parktime;
	for(int i=0;i<3;i++)
	{
		ecofare[i]+=parkcost/total_people;
		bussfare[i]+=parkcost/total_people;
	}
}
void flight::process_halt()
{
	hangarcost=140+(83000-40000)/1000*6.8*hangtime;
		for(int i=0;i<3;i++)
	{
		ecofare[i]+=hangarcost/total_people;
		bussfare[i]+=hangarcost/total_people;
	}
}
void flight::process_nav()
{
		for(int i=0;i<3;i++)
	{
		ecofare[i]+=navcost/total_people;
		bussfare[i]+=navcost/total_people;
	}
}
void flight::process_basefare()
{
	for(int i=0;i<3;i++)
	{
		if(0<airtime[i]<=1) basefare[i]=(rand()%1000)+800;
		if(1<airtime[i]<=2) basefare[i]=(rand()%1200)+1000;
		if(2<airtime[i]<=3) basefare[i]=(rand()%1400)+1200;
		if(3<airtime[i]<=4) basefare[i]=(rand()%1600)+1400;
		if(4<airtime[i]) basefare[i]=airtime[i]*50+(rand()%1800)+1600;
	}
}
void flight::process_perks()
{
	int n;
	cout<<"Enter the no of cabin crew :: ";
	cin>>n;
	perks=(n+2)*6000;
}
void flight::process_groundcost()
{
	for(int i=0;i<3;i++)
    ground_maintainece+=0.01*basefare[i]*(a[i].eco_pas()+a[i].busi_pas());
}
void flight::process_finalfare()
{
	for(int i=0;i<3;i++)
	{
		finalecofare[i]=ecofare[i]+basefare[i];
		finalbusifare[i]=bussfare[i]+basefare[i]+((rand()%300)+200);
	}
}
void flight::process_tax()
{
	for(int i=0;i<3;i++)
	{
		tax_eco[i]=finalecofare[i]+0.05*finalecofare[i]+0.075*finalecofare[i];
		tax_busi[i]=finalbusifare[i]+0.05*finalbusifare[i]+0.075*finalbusifare[i];
		gst+=0.05*finalecofare[i]*(a[i].eco_pas())+0.05*finalbusifare[i]*(a[i].busi_pas());
		servicetax+=0.075*finalecofare[i]*(a[i].eco_pas())+0.075*finalbusifare[i]*(a[i].busi_pas());
	}
}
void flight::process_profit()
{
	int i;
	for(i=0;i<3;i++)
	{
		revenue+=(a[i].eco_pas())*finalecofare[i]+(a[i].busi_pas())*finalbusifare[i];
    }
    for(i=0;i<3;i++)
    {
    	grossprofit+=(a[i].eco_pas())*(finalecofare[i]-ecofare[i])+(a[i].busi_pas())*(finalbusifare[i]-bussfare[i]);
	}
	netprofit=grossprofit-perks-ground_maintainece;
}
void flight::display()
{
	int i,j;
	for(i=0;i<3;i++)
	{
		
			cout<<"Details of trip :: "<<i+1<<endl;
			a[i].log_display();
			a[i].pas_display();
			a[i].time_display();
		    cout<<setw(40)<<"Fuel Surplarge :: ";
		    cout<<total_fuel[i]<<endl;
		    cout<<setw(40)<<"Landing charge :: ";
		    cout<<land_total[i]<<endl;
		    cout<<setw(40)<<"BaseFare :: "<<basefare[i]<<endl;
		    cout<<setw(40)<<"Fare without the base fare ::"<<endl;
		    cout<<setw(40)<<"Economic :: "<<ecofare[i]<<setw(20)<<"Business :: "<<bussfare[i]<<endl;
		    cout<<setw(40)<<"Final fare without tax ::"<<endl;
		    cout<<setw(40)<<"Economy :: "<<finalecofare[i]<<setw(20)<<"Business :: "<<finalbusifare[i]<<endl;
		    cout<<setw(40)<<"Final fare ::"<<endl;
		    cout<<setw(40)<<"Economy :: "<<tax_eco[i]<<setw(20)<<"Business :: "<<tax_busi[i]<<endl;
		    cout<<endl<<endl<<endl<<endl;
	}
	cout<<"Flight details ::\n";
	cout<<setw(40)<<"Airtime :: "<<net_flying_hours<<setw(20)<<"Navigation cost :: "<<navcost<<endl;
	cout<<setw(40)<<"Parking time :: "<<parktime<<setw(20)<<"Parking cost:: "<<parkcost<<endl;
	cout<<setw(40)<<"Housing time :: "<<hangtime<<setw(20)<<"Housing cost:: "<<hangarcost<<endl;
	cout<<setw(40)<<"Cabin crew accodomation cost :: "<<perks<<endl;
	cout<<setw(40)<<"Ground maintainence cost :: "<<ground_maintainece<<endl;
	cout<<setw(40)<<"Revenue generated :: "<<revenue<<endl;
	cout<<setw(40)<<"GrossProfit :: "<<grossprofit<<endl;
	cout<<setw(40)<<"Net profit :: "<<netprofit<<endl;
	cout<<setw(40)<<"Total gst generated :: "<<gst<<endl;
	cout<<setw(40)<<"Total service tax generated :: "<<servicetax<<endl;
}
int main()
{
	flight a1;
	a1.fdata();
    a1.processtime();
	a1.processpeople();
	a1.process_parking();
	a1.process_halt();
	a1.process_nav();
	a1.process_basefare();
	a1.process_perks();
	a1.process_groundcost();
    a1.process_finalfare();
    a1.process_tax();
    a1.process_profit();
	a1.display();
}

