import { useGLTF } from "@react-three/drei";
import { GroupProps, useFrame } from "@react-three/fiber";
import { Mesh, Material, BufferGeometry, Group } from "three"; // Import types from 'three'
import { useRef } from "react"; // Import useRef

// Define type for GLTF result
type GLTFResult = {
  nodes: {
    Curve: Mesh<BufferGeometry>;
    Curve001: Mesh<BufferGeometry>;
  };
  materials: {
    ["SVGMat.817"]: Material;
  };
};

export function Sex(props: GroupProps) {
  // Casting result from useGLTF to the appropriate type
  const { nodes, materials } = useGLTF("/3D/segs.glb") as unknown as GLTFResult;

  // Create a ref for the group to apply rotation
  const groupRef = useRef<Group>(null!); // Type ref correctly to Group

  // Use useFrame to apply rotation on every frame
  useFrame(() => {
    if (groupRef.current) {
      groupRef.current.rotation.y += 0.01; // Rotate around the Y-axis
    }
  });

  return (
    <group position={[0, -1.5, 0]} scale={1.5} ref={groupRef} {...props} dispose={null}>
      <mesh
        castShadow
        receiveShadow
        geometry={nodes.Curve.geometry}
        material={materials["SVGMat.817"]}
        position={[0.194, 0.728, -0.102]}
        rotation={[Math.PI / 2, 0, 0]}
        scale={44.062}
      />
      <mesh
        castShadow
        receiveShadow
        geometry={nodes.Curve001.geometry}
        material={materials["SVGMat.817"]}
        rotation={[Math.PI / 2, 0, 0]}
        scale={26.0}
      />
    </group>
  );
}

// Preload GLTF model for faster loading
useGLTF.preload("/3D/segs.glb");
