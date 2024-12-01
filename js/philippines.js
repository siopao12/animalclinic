const regionsAndProvinces = {
    "Metro Manila": {
        "Provinces": {
            "Metro Manila": {
                "Cities": {
                    "Quezon City": {
                        "Barangays": ["Bagong Pag-asa", "Commonwealth", "Tandang Sora", "Fairview", "Novaliches"]
                    },
                    "Manila": {
                        "Barangays": ["Binondo", "Ermita", "Malate", "Pandacan", "Tondo"]
                    },
                    "Makati": {
                        "Barangays": ["Bel-Air", "Poblacion", "Guadalupe Viejo", "San Lorenzo", "Pembo"]
                    },
                    "Pasig": {
                        "Barangays": ["Bagong Ilog", "Rosario", "San Antonio", "Caniogan", "Ugong"]
                    },
                    "Taguig": {
                        "Barangays": ["Fort Bonifacio", "Ususan", "Pinagsama", "Western Bicutan", "Lower Bicutan"]
                    }
                }
            }
        }
    },
    "Mindanao": {
        "Provinces": {
            "Agusan del Norte": {
                "Cities": {
                    "Butuan City": {
                        "Barangays": ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5"]
                    },
                    "Cabadbaran City": {
                        "Barangays": ["Barangay A", "Barangay B", "Barangay C", "Barangay D", "Barangay E"]
                    }
                }
            },
            "Agusan del Sur": {
                "Cities": {
                    "Bayugan City": {
                        "Barangays": ["Taglatawan", "Poblacion", "San Francisco", "Buenavista", "Villa"]
                    }
                }
            },
            "Basilan": {
                "Cities": {
                    "Isabela City": {
                        "Barangays": ["Sunrise Village", "Riverside", "Tabuk", "Sumagdang", "La Piedad"]
                    }
                }
            },
            "Bukidnon": {
                "Cities": {
                    "Malaybalay City": {
                        "Barangays": ["Aglayan", "Bangcud", "Casisang", "Dalwangan", "Laguitas"]
                    }
                }
            },
            "Camiguin": {
                "Cities": {
                    "Mambajao": {
                        "Barangays": ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5"]
                    }
                }
            },
            "Compostela Valley": {
                "Cities": {
                    "Nabunturan": {
                        "Barangays": ["Barangay A", "Barangay B", "Barangay C", "Barangay D", "Barangay E"]
                    }
                }
            },
            "Cotabato": {
                "Cities": {
                    "Kidapawan City": {
                        "Barangays": ["Barangay A", "Barangay B", "Barangay C", "Barangay D", "Barangay E"]
                    }
                }
            },
            "Davao del Norte": {
                "Cities": {
                    "Tagum City": {
                        "Barangays": ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5"]
                    }
                }
            },
            "Davao del Sur": {
                "Cities": {
                    "Davao City": {
                        "Barangays": ["Acacia", "Agdao", "Alambre", "Alejandra Navarro (Lasang)", "Alfonso Angliongto Sr.", 
                        "Angalan", "Atan-Awe", "Baganihan", "Bago Aplaya", "Bago Gallera", "Bago Oshiro", 
                        "Baguio", "Balengaeng", "Baliok", "Bangkas Heights", "Bantol", "Baracatan", "Barangay 10-A", 
                        "Barangay 11-B", "Barangay 12-B", "Barangay 13-B", "Barangay 14-B", "Barangay 15-B", 
                        "Barangay 16-B", "Barangay 17-B", "Barangay 18-B", "Barangay 19-B", "Barangay 1-A", 
                        "Barangay 20-B", "Barangay 21-C", "Barangay 22-C", "Barangay 23-C", "Barangay 24-C", 
                        "Barangay 25-C", "Barangay 26-C", "Barangay 27-C", "Barangay 28-C", "Barangay 29-C", 
                        "Barangay 2-A", "Barangay 30-C", "Barangay 31-D", "Barangay 32-D", "Barangay 33-D", 
                        "Barangay 34-D", "Barangay 35-D", "Barangay 36-D", "Barangay 37-D", "Barangay 38-D", 
                        "Barangay 39-D", "Barangay 3-A", "Barangay 40-D", "Barangay 4-A", "Barangay 5-A", 
                        "Barangay 6-A", "Barangay 7-A", "Barangay 8-A", "Barangay 9-A", "Bato", "Bayabas", 
                        "Biao Escuela", "Biao Guianga", "Biao Joaquin", "Binugao", "Bucana", "Buda", "Buhangin", 
                        "Bunawan", "Cabantian", "Cadalian", "Calinan", "Callawa", "Camansi", "Carmen", "Catalunan Grande", 
                        "Catalunan Pequeño", "Catigan", "Cawayan", "Centro (San Juan)", "Colosas", "Communal", 
                        "Crossing Bayabas", "Dacudao", "Dalag", "Dalagdag", "Daliao", "Daliaon Plantation", "Datu Salumay", 
                        "Dominga", "Dumoy", "Eden", "Fatima (Benowang)", "Gatungan", "Gov. Paciano Bangoy", 
                        "Gov. Vicente Duterte", "Gumalang", "Gumitan", "Ilang", "Inayangan", "Indangan", 
                        "Kap. Tomas Monteverde Sr.", "Kilate", "Lacson", "Lamanan", "Lampianao", "Langub", 
                        "Lapu-lapu", "Leon Garcia Sr.", "Lizada", "Los Amigos", "Lubogan", "Lumiad", 
                        "Ma-a", "Mabuhay", "Magsaysay", "Magtuod", "Mahayag", "Malabog", "Malagos", "Malamba", 
                        "Manambulan", "Mandug", "Manuel Guianga", "Mapula", "Marapangi", "Marilog", "Matina Aplaya", 
                        "Matina Biao", "Matina Crossing", "Matina Pangi", "Megkawayan", "Mintal", "Mudiang", 
                        "Mulig", "New Carmen", "New Valencia", "Pampanga", "Panacan", "Panalum", "Pandaitan", 
                        "Pangyan", "Paquibato", "Paradise Embak", "Rafael Castillo", "Riverside", "Salapawan", 
                        "Salaysay", "Saloy", "San Antonio", "San Isidro (Licanan)", "Santo Niño", "Sasa", 
                        "Sibulan", "Sirawan", "Sirib", "Suawan (Tuli)", "Subasta", "Sumimao", "Tacunan", 
                        "Tagakpan", "Tagluno", "Tagurano", "Talandang", "Talomo", "Talomo River", "Tamayong", 
                        "Tambobong", "Tamugan", "Tapak", "Tawan-Tawan", "Tibuloy", "Tibungco", "Tigatto", 
                        "Toril", "Tugbok", "Tungakalan", "Ubalde", "Ula", "Vicente Hizon Sr.", "Waan", "Wangan", 
                        "Wilfredo Aquino", "Wines"]
                    },
                    "Digos City": {
                        "Barangays": ["San Jose", "San Miguel", "Zone 1", "Zone 2", "Zone 3"]
                    },
                    "Bansalan": {
                        "Barangays": ["Managa", "Poblacion", "Kinuskusan", "New Clarin", "Anitap"]
                    },
                    "Hagonoy": {
                        "Barangays": ["Guihing", "Leling", "Clib", "Sacub", "San Guillermo"]
                    },
                    "Santa Cruz": {
                        "Barangays": ["Tagabuli", "Astorga", "Darong", "Poblacion", "Tibolo"]
                    }
                }
            },
            "Davao Oriental": {
                "Cities": {
                    "Mati City": {
                        "Barangays": ["Dahican", "Central", "Matiao", "Badas", "Lawigan"]
                    }
                }
            },
            "Dinagat Island": {
                "Cities": {
                    "San Jose": {
                        "Barangays": ["Barangay A", "Barangay B", "Barangay C", "Barangay D", "Barangay E"]
                    }
                }
            },
            "Lanao del Norte": {
                "Cities": {
                    "Iligan City": {
                        "Barangays": ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5"]
                    }
                }
            },
            "Lanao del Sur": {
                "Cities": {
                    "Marawi City": {
                        "Barangays": ["Barangay A", "Barangay B", "Barangay C", "Barangay D", "Barangay E"]
                    }
                }
            },
            "Maguindanao": {
                "Cities": {
                    "Cotabato City": {
                        "Barangays": ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5"]
                    }
                }
            },
            "Misamis Occidental": {
                "Cities": {
                    "Oroquieta City": {
                        "Barangays": ["Barangay A", "Barangay B", "Barangay C", "Barangay D", "Barangay E"]
                    }
                }
            },
            "Misamis Oriental": {
                "Cities": {
                    "Cagayan de Oro City": {
                        "Barangays": ["Nazareth", "Macasandig", "Puntod", "Bulua", "Kauswagan"]
                    }
                }
            },
            "North Cotabato": {
                "Cities": {
                    "Kidapawan City": {
                        "Barangays": ["Barangay A", "Barangay B", "Barangay C", "Barangay D", "Barangay E"]
                    }
                }
            },
            "Sarangani": {
                "Cities": {
                    "Alabel": {
                        "Barangays": ["Barangay A", "Barangay B", "Barangay C", "Barangay D", "Barangay E"]
                    }
                }
            },
            "South Cotabato": {
                "Cities": {
                    "Koronadal City": {
                        "Barangays": ["Barangay A", "Barangay B", "Barangay C", "Barangay D", "Barangay E"]
                    }
                }
            },
            "Zamboanga del Norte": {
                "Cities": {
                    "Dipolog City": {
                        "Barangays": ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5"]
                    }
                }
            }
        }
    },
    "North Luzon": {
        "Provinces": {
            "Ilocos Norte": {
                "Cities": {
                    "Laoag City": {
                        "Barangays": ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5"]
                    }
                }
            },
            "Ilocos Sur": {
                "Cities": {
                    "Vigan City": {
                        "Barangays": ["Pantay Daya", "Pantay Fatima", "Poblacion", "San Julian", "Tamag"]
                    }
                }
            },
            "La Union": {
                "Cities": {
                    "San Fernando City": {
                        "Barangays": ["Dalumpinas Oeste", "Dalumpinas Este", "Lingsat", "Pagdaraoan", "Poro"]
                    }
                }
            },
            "Pangasinan": {
                "Cities": {
                    "Dagupan City": {
                        "Barangays": ["Bonuan Binloc", "Bonuan Gueset", "Carael", "Caranglaan", "Tapuac"]
                    }
                }
            },
            "Benguet": {
                "Cities": {
                    "Baguio City": {
                        "Barangays": ["Asin Road", "Bakakeng Central", "Camp 7", "Loakan Proper", "Aurora Hill"]
                    }
                }
            }
        }
    },
   "South Luzon": {
        "Provinces": {
            "Batangas": {
                "Cities": {
                    "Batangas City": {
                        "Barangays": ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5"]
                    }
                }
            },
            "Cavite": {
                "Cities": {
                    "Tagaytay City": {
                        "Barangays": ["Barangay A", "Barangay B", "Barangay C", "Barangay D", "Barangay E"]
                    }
                }
            },
            "Laguna": {
                "Cities": {
                    "Santa Rosa City": {
                        "Barangays": ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5"]
                    }
                }
            },
            "Quezon": {
                "Cities": {
                    "Lucena City": {
                        "Barangays": ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5"]
                    }
                }
            },
            "Rizal": {
                "Cities": {
                    "Antipolo City": {
                        "Barangays": ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5"]
                    }
                }
            }
        }
    },
    "Visayas": {
        "Provinces": {
            "Cebu": {
                "Cities": {
                    "Cebu City": {
                        "Barangays": ["Lahug", "Mabolo", "Talamban", "Capitol Site", "Basak"]
                    }
                }
            },
            "Bohol": {
                "Cities": {
                    "Tagbilaran City": {
                        "Barangays": ["Dao", "Poblacion", "Bool", "Dampas", "San Isidro"]
                    }
                }
            },
            "Iloilo": {
                "Cities": {
                    "Iloilo City": {
                        "Barangays": ["Jaro", "Molo", "La Paz", "City Proper", "Mandurriao"]
                    }
                }
            },
            "Leyte": {
                "Cities": {
                    "Tacloban City": {
                        "Barangays": ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5"]
                    }
                }
            },
            "Samar": {
                "Cities": {
                    "Calbayog City": {
                        "Barangays": ["Barangay A", "Barangay B", "Barangay C", "Barangay D", "Barangay E"]
                    }
                }
            }
        }
    },
};
// HTML element references
const regionSelect = document.getElementById('region');
const provinceSelect = document.getElementById('province');
const citySelect = document.getElementById('city');
const barangaySelect = document.getElementById('barangay');

// Populate regions
for (let region in regionsAndProvinces) {
    const option = document.createElement('option');
    option.value = region;
    option.text = region;
    regionSelect.appendChild(option);
}

// Handle region change
regionSelect.addEventListener('change', () => {
    resetDropdown(provinceSelect, "Select Province");
    resetDropdown(citySelect, "Select City");
    resetDropdown(barangaySelect, "Select Barangay");

    const selectedRegion = regionsAndProvinces[regionSelect.value];
    if (selectedRegion?.Provinces) {
        for (let province in selectedRegion.Provinces) {
            const option = document.createElement('option');
            option.value = province;
            option.text = province;
            provinceSelect.appendChild(option);
        }
    }
});

// Handle province change
provinceSelect.addEventListener('change', () => {
    resetDropdown(citySelect, "Select City");
    resetDropdown(barangaySelect, "Select Barangay");

    const selectedRegion = regionsAndProvinces[regionSelect.value];
    const selectedProvince = selectedRegion?.Provinces?.[provinceSelect.value];
    if (selectedProvince?.Cities) {
        for (let city in selectedProvince.Cities) {
            const option = document.createElement('option');
            option.value = city;
            option.text = city;
            citySelect.appendChild(option);
        }
    }
});

// Handle city change
citySelect.addEventListener('change', () => {
    resetDropdown(barangaySelect, "Select Barangay");

    const selectedRegion = regionsAndProvinces[regionSelect.value];
    const selectedProvince = selectedRegion?.Provinces?.[provinceSelect.value];
    const selectedCity = selectedProvince?.Cities?.[citySelect.value];
    if (selectedCity?.Barangays) {
        selectedCity.Barangays.forEach(barangay => {
            const option = document.createElement('option');
            option.value = barangay;
            option.text = barangay;
            barangaySelect.appendChild(option);
        });
    }
});

// Reset a dropdown
function resetDropdown(dropdown, placeholder) {
    dropdown.innerHTML = `<option value="" selected>${placeholder}</option>`;
}
