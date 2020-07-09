# TOMATO API

주소 http://tomato-console.ga/api

## Error
status 403
    
    {   
        "message": "Error message"
    }

## GET to terminals

**요청**

    http://tomato-console.ga/api/to-terminals
    
**응답**
                  
    [
        {
            "id": 2,
            "name": "동서울"
        },
        {
            "id": 3,
            "name": "춘천"
        }
    ]

## GET scedules

**요청**

    http://tomato-console.ga/api/schedules/2
    
**응답**
    
    [
        {
            "id": 1,
            "from": "사창리",
            "to": "동서울",
            "time": "06:30",
            "has_stop": true
        },
        {
            "id": 2,
            "from": "사창리",
            "to": "동서울",
            "time": "07:00",
            "has_stop": false
        },
        {
            "id": 3,
            "from": "사창리",
            "to": "동서울",
            "time": "07:20",
            "has_stop": false
        },
        {
            "id": 4,
            "from": "사창리",
            "to": "동서울",
            "time": "07:40",
            "has_stop": false
        },
        {
            "id": 5,
            "from": "사창리",
            "to": "동서울",
            "time": "07:55",
            "has_stop": false
        },
        {
            "id": 6,
            "from": "사창리",
            "to": "동서울",
            "time": "08:10",
            "has_stop": false
        }
    ]
       
       
