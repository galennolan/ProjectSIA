// mapData.js

// Array of school locations
const schoolLocations = [

          { "name": "SMAN 3 Surakarta", "location": [-7.5646448, 110.8406068] },
          { "name": "SMA 17 Surakarta", "location": [-7.5606525, 110.7987016] },
          { "name": "SMA 7 Surakarta", "location": [-7.5767747, 110.7994418] },
          { "name": "SMK 2 Surakarta", "location": [-7.5554295, 110.7830729] },
          { "name": "SMK BK Simo", "location": [-7.523831, 110.595903] },
          { "name": "SMK Negeri 7 Surakarta", "location": [-7.55404856676, 110.7970858] },
          { "name": "Smkn 6 Surakarta", "location": [-7.55313748696, 110.799384556] },
          { "name": "Smas Muhammadiyah 1 Surakarta", "location": [-7.56470077613, 110.821828537] },
          { "name": "SMK WARGA SURAKARTA", "location": [-7.55783823334, 110.8467902] },
          { "name": "SMA Negeri 1 Surakarta", "location": [-7.55819228308, 110.830534724] },
          { "name": "Smas Islam 1 Surakarta", "location": [-7.589643, 110.824045] },
          { "name": "Smas Regina Pacis Surakarta", "location": [-7.55300202196, 110.795864853] },
          { "name": "SMA Santo Yosef", "location": [-7.55574886647, 110.802439138] },
          { "name": "Sman Colomadu", "location": [-7.54267834326, 110.790324153] },
          { "name": "Man 1 Surakarta", "location": [-7.54026350063, 110.825820729] },
          { "name": "Smas Islam 1 Surakarta", "location": [-7.589643, 110.824045] },
   
          { "name": "Madrasah Aliyah Negeri 2 Klaten", "location": [-7.68989594863, 110.611019151] },
          { "name": "Sman 1 Polokarto", "location": [-7.6444627786, 110.886627993] },

          { "name": "Man 2 Sragen", "location": [-7.4196, 110.882] },
          { "name": "SMA N 1 Ngemplak Boyolali", "location": [-7.51367973229, 110.783133454] },
          { "name": "Sman 1 Sukodono", "location": [-7.3331, 110.9638] },
          { "name": "MA Al-AZHAR ANDONG", "location": [-7.53333, 110.583] },
          { "name": "SMUN 2 Boyolali", "location": [-7.51699860648, 110.595982848] },
          { "name": "Smks Slamet Riyadi Gemolong", "location": [-7.39791260004, 110.8310404] },
          {
            "name": "Man 2 Boyolali",
            "location": [-7.43737130252, 110.6724239]
            },
            {
                "name": "Sekolah SMK Kosgoro Sragen",
                "location": [-7.39087606363, 111.069378043]
                },

          { "name": "Smkn 1 Sukoharjo", "location": [-7.40714350018, 109.791542975] },
          { "name": "SMA N 3 SUKOHARJO", "location": [-6.70532167898, 111.358966469] },
          { "name": "SMK Muhammadiyah 1 Sukoharjo", "location": [-7.68374407171, 110.841472114] },
          { "name": "SMA N 3 SUKOHARJO", "location": [-6.70532167898, 111.358966469] },
          { "name": "SMA N 3 SUKOHARJO", "location": [-6.70532167898, 111.358966469] },

          { "name": "Smkn 1 Wonogiri", "location": [-7.8122, 110.9177] },
          { "name": "Sman 2 Wonogiri", "location": [-7.80148120488, 110.919032791] },
          { "name": "SMK Muhammadiyah 1 Sukoharjo", "location": [-7.68374407171, 110.841472114] },
          { "name": "SMA N 3 SUKOHARJO", "location": [-6.70532167898, 111.358966469] },
          { "name": "SMA N 3 SUKOHARJO", "location": [-6.70532167898, 111.358966469] },


      

    // Add more schools as needed
  ];
  
  // Function to create a marker for each school
  function createSchoolMarker(school) {
    const marker = L.marker(school.location).bindPopup(school.name);
    return marker;
  }
  
  // Create an array of school markers
  const schoolMarkers = schoolLocations.map(createSchoolMarker);
  
  // Base layer with OpenStreetMap
  const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  });
  
  // Create the map
  const map = L.map('map', {
    center: [-7.5665, 110.8161], // Surakarta
    zoom: 12, // Adjust the zoom level as needed
    layers: [osm, ...schoolMarkers] // Spread operator to include multiple markers
  });
  
  // Control layer to toggle base layers
  const baseLayers = {
    'OpenStreetMap': osm
  };
  
  // Add control layer to the map
  const layerControl = L.control.layers(baseLayers).addTo(map);
  