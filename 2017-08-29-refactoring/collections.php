<?php

require_once __DIR__ . '/app/vendor/autoload.php';

final class Employee
{

	private $name;

	private $salary;



	public function __construct(string $name, int $salary)
	{
		$this->name = $name;
		$this->salary = $salary;
	}



	public function name(): string
	{
		return $this->name;
	}


	public function salary(): int
	{
		return $this->salary;
	}


	public function increaseWageBy(int $amount)
	{
		$this->salary += $amount;
	}


	public function kick()
	{
		echo sprintf("%s has been kicked.\n", $this->name);
	}
}



$staff = collect([
	new Employee('John', 10000),
	new Employee('Jane', 12000),
	new Employee('Ben', 20000),
	new Employee('Jennifer', 35000)
]);

// filter big bosses
//$bosses = [];

//foreach ($staff as $employee) {
//	if ($employee->salary() >= 20000) {
//		$bosses[] = $employee;
//	}
//}

//$bosses = collect($staff)->filter(function(Employee $employee) {
//	return $employee->salary() >= 20000;
//})->each(function(Employee $employee) {
//	echo $employee->name();
//});







// list of names
//$names = [];
//
//foreach ($staff as $employee) {
//	$names[] = $employee->name();
//}

//$names = $staff->map(function(Employee $employee) {
//	return $employee->name();
//});
//
//var_dump($names);
//
//

// increase wage and get sum
//foreach ($staff as $employee) {
//	$employee->increaseWageBy(5000);
//}

$staff->each->increaseWageBy(5000);

//var_dump($staff);


//$sum = 0;
//
//foreach ($staff as $employee) {
//	$sum += $employee->salary();
//}
//



// name => salary array
//$array = [];
//
//foreach ($staff as $employee) {
//	$array[$employee->name()] = $employee->salary();
//}
//
//$array = $staff->mapWithKeys(function(Employee $employee) {
//	return [
//		$employee->name() => $employee->salary()
//	];
//});
//
//var_dump($array);



// kick workers!
$toBeKicked = [];

foreach ($staff as $i => $employee) {
	if ($i % 2 !== 0) {
		$toBeKicked[] = $employee;
	}
}

foreach ($toBeKicked as $employee) {
	$employee->kick();
}

$staff->nth(2, 1)->each(function(Employee $employee) {
	$employee->kick();
});
