```php
function processData(array $data): array {
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $data[$key] = processData($value); // Recursive call
    } elseif (is_string($value) && strpos($value, 'Error:') === 0) {
      // Handle Error strings correctly
      $data[$key] = str_replace('Error:', '', $value);
    }
  }
  return $data;
}

$data = [
  'field1' => 'value1',
  'field2' => ['subfield1' => 'Error:Something went wrong',
               'subfield2' => 'value2'],
  'field3' => 'Error:Another error'
];

$processedData = processData($data);
print_r($processedData);
```